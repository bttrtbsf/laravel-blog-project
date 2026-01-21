<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Paneli') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="text-gray-500 text-sm font-medium uppercase">Toplam Yazı</div>
                    <div class="flex items-center mt-2">
                        <div class="text-3xl font-bold text-gray-800">{{ $toplamYazi }}</div>
                        <span class="ml-2 text-blue-500 bg-blue-100 text-xs px-2 py-1 rounded">Adet</span>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-gray-500 text-sm font-medium uppercase">Yayında Olan</div>
                    <div class="flex items-center mt-2">
                        <div class="text-3xl font-bold text-gray-800">{{ $yayindakiYazi }}</div>
                        <span class="ml-2 text-green-500 bg-green-100 text-xs px-2 py-1 rounded">Aktif</span>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-yellow-500">
                    <div class="text-gray-500 text-sm font-medium uppercase">Taslaklar</div>
                    <div class="flex items-center mt-2">
                        <div class="text-3xl font-bold text-gray-800">{{ $taslakYazi }}</div>
                        <span class="ml-2 text-yellow-600 bg-yellow-100 text-xs px-2 py-1 rounded">Bekleyen</span>
                    </div>
                </div>

            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2">Son Eklenen Yazı</h3>
                    
                    @if($sonYazi)
                        <div class="flex items-start gap-4">
                            @if($sonYazi->resim)
                                <img src="{{ asset('storage/' . $sonYazi->resim) }}" class="w-24 h-24 object-cover rounded border">
                            @else
                                <div class="w-24 h-24 bg-gray-200 rounded flex items-center justify-center text-gray-400 text-xs">Resim Yok</div>
                            @endif

                            <div>
                                <h4 class="text-xl font-bold text-indigo-600">{{ $sonYazi->baslik }}</h4>
                                <p class="text-gray-500 text-sm mt-1">
                                    {{ $sonYazi->created_at->diffForHumans() }} oluşturuldu.
                                </p>
                                <div class="mt-3">
                                    <a href="{{ route('admin.gonderiler.edit', $sonYazi->id) }}" class="text-white bg-indigo-500 hover:bg-indigo-600 px-3 py-1 rounded text-sm transition">
                                        Düzenle
                                    </a>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 italic">Henüz hiç yazı eklenmemiş.</p>
                    @endif
                    
                </div>
            </div>

        </div>
    </div>
</x-app-layout>