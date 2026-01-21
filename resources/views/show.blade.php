<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $gonderi->baslik }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white shadow mb-8">
        <div class="max-w-4xl mx-auto px-4 h-16 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center text-indigo-600 font-bold hover:text-indigo-800 transition">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Anasayfaya Dön
            </a>
        </div>
    </nav>

    <article class="max-w-4xl mx-auto px-4 pb-20">
        
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            
            @if($gonderi->resim)
                <div class="w-full h-64 md:h-96 relative">
                    <img src="{{ asset('storage/' . $gonderi->resim) }}" 
                         alt="{{ $gonderi->baslik }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black bg-opacity-10"></div>
                </div>
            @endif

            <div class="p-8 md:p-12">
                <div class="mb-8 border-b pb-6">
                    <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 leading-tight">
                        {{ $gonderi->baslik }}
                    </h1>
                    <div class="flex items-center text-gray-500 text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $gonderi->created_at->format('d F Y, H:i') }}
                    </div>
                </div>

                <div class="prose prose-lg max-w-none text-gray-700 leading-loose">
                    {!! nl2br(e($gonderi->icerik)) !!}
                </div>
            </div>

        </div>

    </article>

</body>
</html>