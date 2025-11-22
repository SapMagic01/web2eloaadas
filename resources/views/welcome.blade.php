<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Védett Állatok Nyilvántartása</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-green-50 text-gray-800 font-sans flex flex-col min-h-screen">

<!-- 1. Menüsor (Fejléc) -->
<nav class="bg-green-800 text-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logó / Cím -->
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-leaf"></i>
            <span class="text-xl font-semibold tracking-wide">Természetvédelem</span>
        </div>

        <!-- Menü gombok -->
        <!-- Menü gombok -->
        <div class="flex items-center space-x-6 text-sm font-medium">
            <a href="{{ url('/') }}" class="text-green-200 underline">Főoldal</a>
            <a href="{{ route('allat.index') }}" class="hover:text-green-200 transition">Adatbázis</a>
            <a href="{{ route('kapcsolat.index') }}" class="hover:text-green-200 transition">Kapcsolat</a>

            <!-- Üzenetek gomb + Login/Vezérlőpult -->
            @if (Route::has('login'))
                <div class="border-l border-green-600 pl-6 ml-2 flex items-center gap-4">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.index') }}" class="text-red-500 hover:text-red-700 font-bold transition uppercase mr-4">
                                <i class="fa-solid fa-lock"></i> ADMIN
                            </a>
                        @endif
                        <a href="{{ route('uzenetek.index') }}" class="text-white hover:text-green-200 font-bold transition">
                            <i class="fa-solid fa-envelope"></i> Üzenetek
                        </a>

                        <a href="{{ url('/dashboard') }}" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-gray-100 transition">Vezérlőpult</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-green-200 transition">Belépés</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-green-200 transition">Regisztráció</a>

                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>

<!-- 2. Fő Tartalom -->
<main class="flex-grow flex items-center justify-center">
    <div class="text-center px-4 max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-bold text-green-900 mb-6">
            Magyarország Védett Állatai
        </h1>

        <p class="text-lg md:text-xl text-gray-700 mb-10 leading-relaxed max-w-2xl mx-auto">
            Hivatalos nyilvántartási rendszer a hazai védett és fokozottan védett fajok megőrzéséért.
        </p>

        <div class="flex justify-center gap-4">
            <a href="{{ route('allat.index') }}" class="group bg-green-700 hover:bg-green-800 text-white font-bold py-4 px-10 rounded-lg shadow-lg transition duration-300 transform hover:-translate-y-1 flex items-center text-lg">
                <i class="fa-solid fa-database mr-3 group-hover:animate-bounce"></i>
                Belépés az Adatbázisba
            </a>
        </div>

        <!-- Opcionális másodlagos gomb a főoldal közepére is -->
        <div class="mt-6">
            <a href="{{ route('kapcsolat.index') }}" class="text-green-700 hover:underline text-sm font-bold">
                <i class="fa-solid fa-envelope mr-1"></i> Üzenet küldése az üzemeltetőknek
            </a>
        </div>

        <hr class="my-12 border-green-200 w-2/3 mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-gray-600">
            <div class="p-4 bg-white rounded shadow-sm border border-green-100">
                <div class="text-green-600 text-3xl mb-2"><i class="fa-solid fa-list-check"></i></div>
                <strong class="block text-green-900 text-lg mb-1">Teljes Nyilvántartás</strong>
            </div>
            <div class="p-4 bg-white rounded shadow-sm border border-green-100">
                <div class="text-green-600 text-3xl mb-2"><i class="fa-solid fa-layer-group"></i></div>
                <strong class="block text-green-900 text-lg mb-1">Kategóriák</strong>
            </div>
            <div class="p-4 bg-white rounded shadow-sm border border-green-100">
                <div class="text-green-600 text-3xl mb-2"><i class="fa-solid fa-shield-halved"></i></div>
                <strong class="block text-green-900 text-lg mb-1">Természetvédelmi Érték</strong>
            </div>
        </div>
    </div>
</main>

<!-- 3. Lábléc -->
<footer class="bg-green-900 text-green-100 text-center py-6 mt-auto">
    <div class="container mx-auto">
        <p>&copy; {{ date('Y') }} Védett Állatok Nyilvántartása</p>
    </div>
</footer>
</body>
</html>
