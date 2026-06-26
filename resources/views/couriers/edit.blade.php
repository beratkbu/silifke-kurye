<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kurye Bilgilerini Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('couriers.update', $courier->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Kurye Adı -->
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Kurye Adı Soyadı</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $courier->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Telefon -->
                    <div class="mb-4">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Telefon Numarası</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $courier->phone) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Plaka -->
                    <div class="mb-4">
                        <label for="plate_number" class="block text-sm font-medium text-gray-700">Motor Plakası</label>
                        <input type="text" name="plate_number" id="plate_number" value="{{ old('plate_number', $courier->plate_number) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <!-- Durum (Aktif/Pasif) -->
                    <div class="mb-4">
                        <label for="is_active" class="block text-sm font-medium text-gray-700">Çalışma Durumu</label>
                        <select name="is_active" id="is_active" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="1" {{ $courier->is_active ? 'selected' : '' }}>Aktif (Sipariş Alabilir)</option>
                            <option value="0" {{ !$courier->is_active ? 'selected' : '' }}>Pasif (İzinde / Çalışmıyor)</option>
                        </select>
                    </div>

                    <!-- Butonlar -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('couriers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition duration-150">
                            İptal
                        </a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-150">
                            Değişiklikleri Kaydet
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>