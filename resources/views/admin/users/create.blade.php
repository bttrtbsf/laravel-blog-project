<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Yeni Kullanıcı Ekle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                            <strong class="font-bold">Dikkat!</strong>
                            <span class="block sm:inline">Lütfen aşağıdaki hataları düzeltin.</span>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf <div class="mb-4">
                            <label for="ad" class="block text-gray-700 text-sm font-bold mb-2">Ad:</label>
                            <input type="text" name="ad" id="ad" value="{{ old('ad') }}" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        @csrf <div class="mb-4">
                            <label for="soyad" class="block text-gray-700 text-sm font-bold mb-2">Soyad:</label>
                            <input type="text" name="soyad" id="soyad" value="{{ old('soyad') }}" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Adresi:</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Kullanıcı Rolü:</label>
                            <select name="role" id="role" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="okuyucu">Okuyucu (Standart)</option>
                                <option value="yazar">Yazar</option>
                                <option value="admin">Yönetici (Admin)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Şifre:</label>
                            <input type="password" name="password" id="password" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-6">
                            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Şifre Tekrarı:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <p class="text-gray-600 text-xs italic mt-1">Şifre ile şifre tekrarı aynı olmalıdır.</p>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Kaydet
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="inline-block align-baseline font-bold text-sm text-gray-500 hover:text-gray-800">
                                İptal
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>