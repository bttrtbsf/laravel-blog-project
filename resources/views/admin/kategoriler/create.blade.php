<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">Yeni Kategori</h2></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.kategoriler.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Kategori İsmi</label>
                        <input type="text" name="isim" class="w-full border rounded p-2" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-bold mb-2">Açıklama</label>
                        <textarea name="aciklama" class="w-full border rounded p-2"></textarea>
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Kaydet</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>