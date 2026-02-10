<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gönderiyi Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.gonderiler.update', $gonderi->id) }}" method="POST">
                        @csrf 
                        @method('PATCH') <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="baslik">Başlık</label>
                            <input type="text" name="baslik" id="baslik" 
                                value="{{ old('baslik', $gonderi->baslik) }}" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="icerik">İçerik</label>
                            <textarea name="icerik" id="icerik" rows="5"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('icerik', $gonderi->icerik) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
    <select name="kategori_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
        
        @foreach($kategoriler as $kategori)
            <option value="{{ $kategori->id }}" 
                {{ $gonderi->kategori_id == $kategori->id ? 'selected' : '' }}> 
                {{ $kategori->isim }}
            </option>
        @endforeach

    </select>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="taslak">Durum</label>
                            <select name="taslak" id="taslak" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="0" {{ $gonderi->taslak == 0 ? 'selected' : '' }}>Yayınla</option>
                                <option value="1" {{ $gonderi->taslak == 1 ? 'selected' : '' }}>Taslak Olarak Kaydet</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Güncelle
                            </button>
                            <a href="{{ route('admin.gonderiler.index') }}" class="text-blue-500 hover:text-blue-800">İptal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>