<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    // Tüm kuryeleri listelediğimiz ana sayfa
    public function index()
    {
        $couriers = Courier::all();
        return view('couriers.index', compact('couriers'));
    }

    // Yeni kurye ekleme formu sayfası
    public function create()
    {
        return view('couriers.create');
    }

    // Formdan gelen verileri veritabanına kaydetme
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'plate_number' => 'required|string|max:20',
        ]);

        Courier::create($request->all());

        return redirect()->route('couriers.index')->with('success', 'Kurye başarıyla sisteme eklendi!');
    }

    // Kurye detayını gösterme (Şimdilik boş bırakabiliriz)
    public function show(Courier $courier)
    {
        //
    }

    // Kurye düzenleme sayfası
    public function edit(Courier $courier)
    {
        return view('couriers.edit', compact('courier'));
    }

    // Kurye bilgilerini güncelleme
    public function update(Request $request, Courier $courier)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'plate_number' => 'required|string|max:20',
            'is_active' => 'required|boolean',
        ]);

        $courier->update($request->all());

        return redirect()->route('couriers.index')->with('success', 'Kurye bilgileri güncellendi!');
    }

    // Kuryeyi sistemden silme
    public function destroy(Courier $courier)
    {
        $courier->delete();
        return redirect()->route('couriers.index')->with('success', 'Kurye sistemden silindi!');
    }
}