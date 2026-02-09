<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Kategoriler</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-bold">Kategori Listesi</h3>
                    <a href="{{ route('admin.kategoriler.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Yeni Ekle</a>
                </div>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">İsim</th>
                            <th class="px-4 py-2 text-left">Açıklama</th>
                            <th class="px-4 py-2 text-right">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kategoriler as $kategori)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $kategori->isim }}</td>
                            <td class="px-4 py-2">{{ $kategori->aciklama }}</td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('admin.kategoriler.edit', $kategori->id) }}" class="text-blue-600 mr-2">Düzenle</a>
                                <form action="{{ route('admin.kategoriler.destroy', $kategori->id) }}" method="POST" class="inline" onsubmit="return confirm('Silmek istiyor musun?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600">Sil</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>