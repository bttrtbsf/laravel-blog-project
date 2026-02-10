<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gönderiler') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Başarılı!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Yazı Listesi</h3>
                
                <a href="{{ route('admin.gonderiler.create') }}" 
                   class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow transition">
                    + Yeni Ekle
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <table class="w-full border-collapse border border-slate-300">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class="border border-slate-300 p-3 w-24">Resim</th>
                                <th class="border border-slate-300 p-3">Başlık</th>
                                <th class="border border-slate-300 p-3">Kategori</th> <th class="border border-slate-300 p-3">Durum</th>
                                <th class="border border-slate-300 p-3 text-center w-48">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse ($gonderiler as $gonderi)
                                <tr class="bg-white border-b hover:bg-gray-50 transition duration-150">
                                    
                                    <td class="border border-slate-300 p-3">
                                        @if($gonderi->resim)
                                            <img src="{{ asset('storage/' . $gonderi->resim) }}" alt="Kapak" class="w-16 h-16 object-cover rounded border border-gray-200">
                                        @else
                                            <span class="text-gray-400 text-xs italic">Resim Yok</span>
                                        @endif
                                    </td>

                                    <td class="border border-slate-300 p-3 font-medium text-gray-900">
                                        {{ $gonderi->baslik }}
                                    </td>
                                    
                                    <td class="border border-slate-300 p-3">
                                        <span class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">
                                            {{ $gonderi->kategori ? $gonderi->kategori->isim : 'Genel' }}
                                        </span>
                                    </td>

                                    <td class="border border-slate-300 p-3">
                                        @if($gonderi->taslak)
                                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-yellow-200">Taslak</span>
                                        @else
                                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-green-200">Yayında</span>
                                        @endif
                                    </td>
                                    
                                    <td class="border border-slate-300 p-3 text-center">
                                        <div class="flex justify-center items-center gap-2">
                                            
                                            <a href="{{ route('admin.gonderiler.edit', $gonderi->id) }}" 
                                               class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded text-sm transition shadow-sm">
                                                Düzenle
                                            </a>
                                            
                                            <form action="{{ route('admin.gonderiler.destroy', $gonderi->id) }}" method="POST" onsubmit="return confirm('Bu gönderiyi silmek istediğinize emin misiniz?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm transition shadow-sm">
                                                    Sil
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border border-slate-300 p-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <p class="text-lg">Henüz hiç gönderi eklenmemiş.</p>
                                            <p class="text-sm text-gray-400">Yeni bir yazı ekleyerek başlayabilirsiniz.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>