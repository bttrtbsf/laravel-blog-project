<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kullanıcıyı Düzenle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if ($errors->any())
                        <div class="mb-4 bg-red-100 border-red-400 text-red-700 px-4 py-3 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Ad:</label>
                            <input type="text" name="ad" value="{{ old('ad', $user->ad) }}" 
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Soyad:</label>
                            <input type="text" name="soyad" value="{{ old('soyad', $user->soyad) }}" 
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" 
                                class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Rol:</label>
                            <select name="role" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="user" {{ $user->rol == 'user' ? 'selected' : '' }}>Standart Kullanıcı</option>
                                <option value="yazar" {{ $user->rol == 'yazar' ? 'selected' : '' }}>Yazar</option>
                                <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Yönetici</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Yeni Şifre (Değiştirmek istemiyorsanız boş bırakın):</label>
                            <input type="password" name="password" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Şifre Tekrarı:</label>
                            <input type="password" name="password_confirmation" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight">
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Güncelle
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="text-gray-500 hover:text-gray-800 font-bold">İptal</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>