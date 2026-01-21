<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yeni Gönderi Oluştur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Dikkat!</strong>
                            <ul class="list-disc pl-5 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.gonderiler.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Başlık</label>
                            <input type="text" name="baslik" value="{{ old('baslik') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kapak Fotoğrafı</label>
                            <input type="file" name="resim" class="w-full border border-gray-300 p-2 rounded focus:outline-none">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">İçerik</label>
                            <textarea name="icerik" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('icerik') }}</textarea>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Durum</label>
                            <select name="taslak" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="0">Yayınla</option>
                                <option value="1">Taslak Olarak Kaydet</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end gap-4 border-t pt-4">
                            <a href="{{ route('admin.gonderiler.index') }}" class="text-gray-600 hover:text-gray-900 font-bold">
                                İptal
                            </a>
                            <button type="submit" style="background-color: #4f46e5; color: white;" class="font-bold py-2 px-6 rounded shadow hover:opacity-90 transition">
                                Kaydet
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>