<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sipariş Güncelle & Durum Değiştir') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('orders.update', $order->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Müşteri Adı -->
                    <div class="mb-4">
                        <label for="customer_name" class="block text-sm font-medium text-gray-700">Müşteri Adı Soyadı</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Adresler -->
                    <div class="mb-4">
                        <label for="pickup_address" class="block text-sm font-medium text-gray-700">Paketin Alınacağı Adres</label>
                        <textarea name="pickup_address" id="pickup_address" rows="2" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('pickup_address', $order->pickup_address) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="delivery_address" class="block text-sm font-medium text-gray-700">Teslim Edilecek Adres</label>
                        <textarea name="delivery_address" id="delivery_address" rows="2" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('delivery_address', $order->delivery_address) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Ücret -->
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Sipariş Ücreti (TL)</label>
                            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $order->price) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <!-- Kurye Değiştirme / Atama -->
                        <div class="mb-4">
                            <label for="courier_id" class="block text-sm font-medium text-gray-700">Atanan Kurye</label>
                            <select name="courier_id" id="courier_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="">-- Kurye Atanmadı --</option>
                                @foreach($couriers as $courier)
                                    <option value="{{ $courier->id }}" {{ $order->courier_id == $courier->id ? 'selected' : '' }}>
                                        {{ $courier->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- SIPARIŞ DURUMU -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700 font-bold text-blue-600">Sipariş Durumu</label>
                            <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 font-semibold text-gray-800">
                                <option value="Hazırlanıyor" {{ $order->status == 'Hazırlanıyor' ? 'selected' : '' }}>⏳ Hazırlanıyor</option>
                                <option value="Yolda" {{ $order->status == 'Yolda' ? 'selected' : '' }}>🏍️ Yolda</option>
                                <option value="Teslim Edildi" {{ $order->status == 'Teslim Edildi' ? 'selected' : '' }}>✅ Teslim Edildi</option>
                            </select>
                        </div>
                    </div>

                    <!-- Butonlar -->
                    <div class="flex justify-end space-x-3 mt-4">
                        <a href="{{ route('orders.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-150">
                            İptal
                        </a>
                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                            Güncelle
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>