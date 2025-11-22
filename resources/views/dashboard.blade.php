<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vezérlőpult - Természetvédelem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-green-50 text-gray-800 font-sans flex flex-col min-h-screen">

<!-- MENÜSOR (Zöld stílus) -->
<nav class="bg-green-800 text-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-2 hover:text-green-200 transition">
            <i class="fa-solid fa-leaf"></i>
            <span class="text-xl font-semibold tracking-wide">Természetvédelem</span>
        </a>

        <div class="space-x-6 text-sm font-medium flex items-center">
            <a href="{{ url('/') }}" class="hover:text-green-200 transition">Főoldal</a>
            <a href="{{ route('allat.index') }}" class="hover:text-green-200 transition">Adatbázis</a>
            <a href="{{ route('kapcsolat.index') }}" class="hover:text-green-200 transition">Kapcsolat</a>

            @auth
                <!-- Admin gomb -->
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.index') }}" class="text-red-500 hover:text-red-700 font-bold transition uppercase mr-2">
                        <i class="fa-solid fa-lock"></i> ADMIN
                    </a>
                @endif

                <a href="{{ route('uzenetek.index') }}" class="hover:text-green-200 transition">Üzenetek</a>

                <!-- Aktív állapot jelzése a Vezérlőpulton -->
                <span class="bg-white text-green-800 px-3 py-1 rounded font-bold cursor-default">Vezérlőpult</span>
            @endauth
        </div>
    </div>
</nav>

<!-- TARTALOM -->
<main class="flex-grow container mx-auto px-4 py-10">

    <!-- Üdvözlő fejléc -->
    <div class="mb-8 text-center md:text-left">
        <h1 class="text-3xl font-bold text-green-900">
            Üdvözöllek, {{ Auth::user()->name }}!
        </h1>
        <p class="text-gray-600 mt-2">Ez a te személyes vezérlőpultod. Innen minden funkciót elérsz.</p>
    </div>

    <!-- Gyorsgombok (Kártyák) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- 1. Adatbázis Kártya -->
        <a href="{{ route('allat.index') }}" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition border-l-4 border-green-600 group">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-green-700 transition">Állatok kezelése</h3>
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                    <i class="fa-solid fa-database"></i>
                </div>
            </div>
            <p class="text-gray-600 text-sm">Új védett állatok felvétele, szerkesztése vagy a teljes lista megtekintése.</p>
        </a>

        <!-- 2. Statisztika Kártya -->
        <a href="{{ route('diagram.index') }}" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition border-l-4 border-yellow-500 group">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-yellow-600 transition">Statisztika</h3>
                <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
            </div>
            <p class="text-gray-600 text-sm">Nézd meg a diagramot az állatok eloszlásáról eszmei érték szerint.</p>
        </a>

        <!-- 3. Üzenetek Kártya -->
        <a href="{{ route('uzenetek.index') }}" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition border-l-4 border-blue-500 group">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition">Üzenetek</h3>
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                    <i class="fa-solid fa-envelope"></i>
                </div>
            </div>
            <p class="text-gray-600 text-sm">A látogatók által küldött kapcsolatfelvételi üzenetek olvasása.</p>
        </a>

        <!-- 4. Profil Szerkesztése -->
        <a href="{{ route('profile.edit') }}" class="block bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition border-l-4 border-purple-500 group">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-xl font-bold text-gray-800 group-hover:text-purple-600 transition">Fiók beállítások</h3>
                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center text-purple-600">
                    <i class="fa-solid fa-user-gear"></i>
                </div>
            </div>
            <p class="text-gray-600 text-sm">Személyes adatok, név és jelszó módosítása vagy fiók törlése.</p>
        </a>

        <!-- 5. Csak Adminnak: Admin Panel -->
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.index') }}" class="block bg-red-50 p-6 rounded-xl shadow-md hover:shadow-xl transition border-l-4 border-red-600 group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-red-800 group-hover:text-red-600 transition">Admin Felület</h3>
                    <div class="w-10 h-10 bg-red-200 rounded-full flex items-center justify-center text-red-700">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>
                <p class="text-red-600 text-sm">Kiemelt adminisztrátori funkciók elérése.</p>
            </a>
        @endif

    </div>

    <!-- Kijelentkezés gomb (külön, alul) -->
    <div class="mt-10 text-center">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="inline-flex items-center px-6 py-3 bg-gray-800 border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <i class="fa-solid fa-right-from-bracket mr-2"></i> Kijelentkezés
            </button>
        </form>
    </div>

</main>

<!-- Lábléc -->
<footer class="bg-green-900 text-green-100 text-center py-6 mt-auto">
    <div class="container mx-auto">
        <p>&copy; {{ date('Y') }} Védett Állatok Nyilvántartása</p>
    </div>
</footer>

</body>
</html>
