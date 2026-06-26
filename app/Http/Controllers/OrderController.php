<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Courier;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Canlı Sipariş Takip Paneli (Dashboard) ve Sipariş Listesi
     */
    public function index()
    {
        // Bugünün siparişlerini çekiyoruz (Canlı panel için)
        $orders = Order::with('courier')
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->get();

        // Formlarda seçilmesi için tüm kuryeleri çekiyoruz
        $couriers = Courier::all();

        // Bugünün ciro ve paket istatistikleri
        $stats = [
            'total_orders' => $orders->count(),
            'delivered_orders' => $orders->where('status', 'Teslim Edildi')->count(),
            'total_revenue' => $orders->where('status', 'Teslim Edildi')->sum('ucret'),
            'active_couriers' => $couriers->count(),
        ];

        return view('dashboard', compact('orders', 'couriers', 'stats'));
    }

    /**
     * Yeni Sipariş Giriş Formu (Esnaf Ekranı)
     */
    public function create()
    {
        $couriers = Courier::all();
        return view('orders.create', compact('couriers'));
    }

    /**
     * Siparişi Kaydetme ve Kuryeye SMS Bildirimi Fırlatma
     */
    public function store(Request $request)
    {
        // 1. Gelen verileri doğruluyoruz
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'telefon' => 'required|string',
            'bolge' => 'required|string',
            'ucret' => 'required|numeric',
            'courier_id' => 'required|exists:couriers,id',
            'not' => 'nullable|string',
        ]);

        // 2. Siparişi "Hazırlanıyor" durumuyla kaydediyoruz
        $order = Order::create([
            'customer_name' => $validated['customer_name'],
            'telefon' => $validated['telefon'],
            'bolge' => $validated['bolge'],
            'ucret' => $validated['ucret'],
            'courier_id' => $validated['courier_id'],
            'not' => $validated['not'] ?? null,
            'status' => 'Hazırlanıyor',
        ]);

        // 3. Kuryeyi bulup cebine anında "Dükkana gel, paket var!" SMS'i gönderiyoruz
        $courier = Courier::find($validated['courier_id']);
        if ($courier && $courier->telefon) {
            $kuryeMesaj = "Şefim Selam! " . $order->bolge . " bölgesine yeni bir sipariş girildi. Lütfen dükkana gelip paketi teslim al!";
            $this->sendSms($courier->telefon, $kuryeMesaj);
        }

        return redirect()->route('dashboard')->with('success', 'Sipariş başarıyla eklendi ve kuryeye bildirildi!');
    }

    /**
     * Kurye Butonlarına Basınca Durum Güncelleme ve Müşteriye SMS Atma
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:Hazırlanıyor,Yolda,Teslim Edildi,İptal Edildi'
        ]);

        $oldStatus = $order->status;
        $order->status = $request->status;
        $order->save();

        // Kurye "Yola Çıkar" butonuna bastığında MÜŞTERİYE SMS fırlatıyoruz
        if ($order->status === 'Yolda' && $oldStatus !== 'Yolda') {
            if ($order->telefon) {
                $musteriMesaj = "Değerli Müşterimiz, siparişiniz yola çıkmıştır! Kuryemiz paketinizle birlikte bölgenize doğru hareket halindedir. Afiyet olsun!";
                $this->sendSms($order->telefon, $musteriMesaj);
            }
        }

        return redirect()->route('dashboard')->with('success', 'Sipariş durumu güncellendi!');
    }

    /**
     * Ortak SMS Gönderme Motoru (Netgsm Altyapısı)
     */
    protected function sendSms($telefon, $mesaj)
    {
        // Telefon numarasının başındaki sıfırı temizleme optimizasyonu
        $telefon = ltrim($telefon, '0');
        
        // Uluslararası formata getiriyoruz (Netgsm için 90XXXXXXXXXX)
        if (strlen($telefon) == 10) {
            $telefon = '90' . $telefon;
        }

        $username = env('NETGSM_USER');
        $password = env('NETGSM_PASS');
        $header = env('NETGSM_HEADER');

        if (!$username || !$password) {
            \Log::info("SMS Simülasyonu (Kimlik bilgileri eksik): Gönderilen numara: $telefon, Mesaj: $mesaj");
            return false;
        }

        $url = "https://api.netgsm.com.tr/sms/send/get/?usercode=" . urlencode($username) . 
               "&password=" . urlencode($password) . 
               "&gsmno=" . urlencode($telefon) . 
               "&message=" . urlencode($mesaj) . 
               "&msgheader=" . urlencode($header);

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $response = curl_exec($ch);
            curl_close($ch);

            \Log::info("Netgsm SMS Gönderildi. Numara: $telefon, Yanıt: " . $response);
            return true;
        } catch (\Exception $e) {
            \Log::error("SMS Gönderim Hatası: " . $e->getMessage());
            return false;
        }
    }
}