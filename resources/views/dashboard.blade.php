<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('🏍️ Canlı Sipariş Takip Ekranı') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm relative overflow-hidden">
                    <div class="text-3xl absolute right-4 bottom-3 opacity-10">🏍️</div>
                    <h4 class="text-gray-400 text-xs uppercase tracking-wider mb-2 font-medium">Bugünkü Sipariş</h4>
                    <p class="text-blue-600 text-2xl font-bold" id="today-orders-count">{{ $todayOrders }} Paket</p>
                    <span class="text-gray-500 text-xs">Mevcut Dağıtımda</span>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm relative overflow-hidden">
                    <div class="text-3xl absolute right-4 bottom-3 opacity-10">💰</div>
                    <h4 class="text-gray-400 text-xs uppercase tracking-wider mb-2 font-medium">Bugünkü Ciro</h4>
                    <p class="text-yellow-600 text-2xl font-bold">{{ number_format($todayRevenue, 2) }} TL</p>
                    <span class="text-green-600 text-xs font-semibold">● Canlı Akış Aktif</span>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm relative overflow-hidden">
                    <div class="text-3xl absolute right-4 bottom-3 opacity-10">📦</div>
                    <h4 class="text-gray-400 text-xs uppercase tracking-wider mb-2 font-medium">Toplam Sipariş</h4>
                    <p class="text-gray-800 text-2xl font-bold">{{ $totalOrders }} Adet</p>
                    <span class="text-gray-500 text-xs">Veritabanı Arşivi</span>
                </div>

                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm relative overflow-hidden">
                    <div class="text-3xl absolute right-4 bottom-3 opacity-10">📈</div>
                    <h4 class="text-gray-400 text-xs uppercase tracking-wider mb-2 font-medium">Toplam Kasa (Genel)</h4>
                    <p class="text-green-600 text-2xl font-bold">{{ number_format($totalRevenue, 2) }} TL</p>
                    <span class="text-gray-500 text-xs">Brüt Hesaplanan</span>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm overflow-x-auto">
                <h3 class="text-gray-800 mb-6 text-lg font-semibold flex items-center gap-2">
                    📋 Canlı Sipariş Akış Havuzu <span id="live-indicator" class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                </h3>
                
                <table class="w-full text-left border-collapse text-gray-600 text-sm">
                    <thead>
                        <tr class="border-b-2 border-gray-100 text-gray-800 font-semibold">
                            <th class="pb-3 px-2">Müşteri / İşletme</th>
                            <th class="pb-3 px-2">Telefon</th>
                            <th class="pb-3 px-2">Bölge</th>
                            <th class="pb-3 px-2">Adres Detayları</th>
                            <th class="pb-3 px-2">Ücret</th>
                            <th class="pb-3 px-2">Durum</th>
                            <th class="pb-3 px-2 text-center">Aksiyonlar</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100" id="orders-table-body">
                        @forelse($orders as $order)
                        <tr class="hover:bg-gray-50 transition duration-150" data-order-id="{{ $order->id }}">
                            <td class="py-4 px-2 font-semibold text-gray-950">{{ $order->customer_name }}</td>
                            <td class="py-4 px-2 text-blue-600 font-medium">{{ $order->phone ?? 'Belirtilmedi' }}</td>
                            <td class="py-4 px-2">
                                <span class="bg-amber-50 text-amber-700 px-2.5 py-1 rounded-md text-xs font-semibold border border-amber-200 uppercase">
                                    {{ $order->region ?? 'Merkez' }}
                                </span>
                            </td>
                            <td class="py-4 px-2 max-w-xs leading-relaxed">
                                <div class="text-xs text-green-700"><strong>Alım:</strong> {{ $order->pickup_address }}</div>
                                <div class="text-xs text-red-600 mt-1"><strong>Teslim:</strong> {{ $order->delivery_address }}</div>
                            </td>
                            <td class="py-4 px-2 font-bold text-green-600">{{ number_format($order->price, 2) }} TL</td>
                            <td class="py-4 px-2">
                                @if($order->status == 'pending')
                                    <span class="bg-orange-50 text-orange-700 px-2.5 py-1 rounded-full text-xs font-medium border border-orange-200">⌛ Bekliyor</span>
                                @elseif($order->status == 'preparing')
                                    <span class="bg-blue-50 text-blue-700 px-2.5 py-1 rounded-full text-xs font-medium border border-blue-200">👨‍🍳 Hazırlanıyor</span>
                                @elseif($order->status == 'on_the_way')
                                    <span class="bg-teal-50 text-teal-700 px-2.5 py-1 rounded-full text-xs font-medium border border-teal-200">🏍️ Yolda</span>
                                @else
                                    <span class="bg-green-50 text-green-700 px-2.5 py-1 rounded-full text-xs font-medium border border-green-200">✅ Teslim Edildi</span>
                                @endif
                            </td>
                            <td class="py-4 px-2 text-center">
                                <form action="{{ route('orders.update-status', $order->id) }}" method="POST" class="inline-flex gap-1.5">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status" value="preparing" class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-2.5 py-1.5 text-xs font-medium transition shadow-sm" title="Hazırlanıyor">👨‍🍳</button>
                                    <button type="submit" name="status" value="on_the_way" class="bg-teal-600 hover:bg-teal-700 text-white rounded-lg px-2.5 py-1.5 text-xs font-medium transition shadow-sm" title="Yola Çıkar">🏍️</button>
                                    <button type="submit" name="status" value="delivered" class="bg-green-600 hover:bg-green-700 text-white rounded-lg px-2.5 py-1.5 text-xs font-medium transition shadow-sm" title="Teslim Edildi">✅</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr id="empty-row">
                            <td colspan="7" class="py-6 text-center text-gray-400">Sistemde henüz aktif bir sipariş bulunmuyor şefim.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        // Sayfa açıldığında tarayıcıdan bildirim izni isteyelim
        document.addEventListener('DOMContentLoaded', function () {
            if (Notification.permission !== "granted") {
                Notification.requestPermission();
            }
        });

        // Bildirim sesi için online temiz bir bip sesi tanımlayalım
        const audioNotification = new Audio('https://assets.mixkit.co/active_storage/sfx/2869/2869-600.wav');

        // Sayfayı yenilemeden her 5 saniyede bir siparişleri arkadan kontrol et
        setInterval(function() {
            fetch('/api/live-orders-check') // Laravel'e çaktırmadan soruyoruz
                .then(response => response.json())
                .then(data => {
                    // Eğer veritabanındaki bugünkü paket sayısı, ekrandakinden fazlaysa yeni sipariş gelmiştir!
                    let currentCount = parseInt(document.getElementById('today-orders-count').innerText);
                    
                    if (data.todayOrders > currentCount) {
                        // 1. Sesi Çal
                        audioNotification.play();

                        // 2. Tarayıcıya Yukarıdan Bildirim Fırlat
                        if (Notification.permission === "granted") {
                            new Notification("🏍️ Yeni Sipariş Düştü!", {
                                body: "Silifke Kurye Havuzuna yeni bir teslimat eklendi şefim!",
                                icon: "https://cdn-icons-png.flaticon.com/512/2950/2950645.png"
                            });
                        }

                        // 3. Sayfayı çaktırmadan yenile ki yeni sipariş listeye gelsin
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    }
                })
                .catch(err => console.log('Canlı akış kontrol hatası:', err));
        }, 5000); // 5 saniyede bir otomatik takip eder
    </script>
</x-app-layout>