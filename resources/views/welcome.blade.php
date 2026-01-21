<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Anasayfa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">Benim Blogum</h1>
            <div>
                @if (Route::has('login'))
                    @auth
                      <a href="{{ url('/admin/gonderiler') }}" class="text-sm text-gray-700 underline">Admin Paneli</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Giriş Yap</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-4">
        
        @forelse($gonderiler as $gonderi)
            <div class="bg-white rounded-lg shadow-md mb-6 overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2 text-gray-800">{{ $gonderi->baslik }}</h2>
                    <p class="text-gray-500 text-sm mb-4">
                        {{ $gonderi->created_at->format('d.m.Y') }} tarihinde yayınlandı.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        {{ Str::limit($gonderi->icerik, 150) }}
                    </p>
                    <a href="{{ route('front.show', $gonderi->id) }}" class="inline-block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition" class="inline-block bg-indigo-500 text-white px-4 py-2 rounded hover:bg-indigo-600 transition">
                        Devamını Oku &rarr;
                    </a>
                </div>
            </div>
        @empty
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p class="font-bold">Üzgünüz :(</p>
                <p>Henüz yayınlanmış bir blog yazısı bulunmamaktadır.</p>
            </div>
        @endforelse

    </div>

</body>
</html>