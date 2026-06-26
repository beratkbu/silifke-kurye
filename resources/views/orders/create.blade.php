<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yeni Sipariş') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-height-100vh">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-400 text-red-700 rounded-lg">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Müşteri Adı Soyadı</label>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3.5 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Müşteri Telefon Numarası</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="05xx xxx xx xx" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3.5 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Gönderi Bölgesi</label>
                        <select name="region" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3.5 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white" required>
                            <option value="Merkez">Merkez (Silifke)</option>
                            <option value="Taşucu">Taşucu</option>
                            <option value="Atakent">Atakent</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Paketin Alınacağı Adres (Restoran/Mağaza)</label>
                        <textarea name="pickup_address" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3.5 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-24" required>{{ old('pickup_address') }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">Teslim Edilecek Adres (Müşteri Evi)</label>
                        <textarea name="delivery_address" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3.5 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 h-24" required>{{ old('delivery_address') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Sipariş verme (TL)</label>
                            <input type="text" name="price" value="{{ old('price') }}" placeholder="120,00" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3.5 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-medium mb-2">Siparişi Taşıyacak Kurye</label>
                            <select name="courier_id" class="shadow-sm appearance-none border border-gray-300 rounded-lg w-full py-2.5 px-3.5 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="">Kurye Seçilmedi (Havuzda Beklesin)</option>
                                @foreach($couriers ?? [] as $courier)
                                    <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200">
                            İptal
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200 shadow-md">
                            Siparişi tamamladı
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>