<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Beállítások</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-green-50 text-gray-800 font-sans flex flex-col min-h-screen">

<!-- MENÜSOR (A zöld stílus) -->
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
                <!-- Admin gomb ellenőrzés -->
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.index') }}" class="text-red-500 hover:text-red-700 font-bold transition uppercase mr-2">
                        <i class="fa-solid fa-lock"></i> ADMIN
                    </a>
                @endif

                <a href="{{ route('uzenetek.index') }}" class="hover:text-green-200 transition">Üzenetek</a>

                <!-- Aktív Vezérlőpult -->
                <a href="{{ url('/dashboard') }}" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-gray-100 transition font-bold">Vezérlőpult</a>
            @endauth
        </div>
    </div>
</nav>

<!-- TARTALOM -->
<main class="flex-grow container mx-auto px-4 py-10">

    <div class="max-w-4xl mx-auto mb-6">
        <h1 class="text-3xl font-bold text-green-900 mb-2">Profil Szerkesztése</h1>
        <p class="text-gray-600">Itt módosíthatod a fiókod adatait és jelszavát.</p>
    </div>

    <div class="max-w-4xl mx-auto space-y-6">

        <!-- 1. Kártya: Személyes adatok -->
        <div class="p-4 sm:p-8 bg-white shadow-lg sm:rounded-xl border border-green-100">
            <div class="max-w-xl">
                <h2 class="text-lg font-medium text-green-900 mb-4 border-b border-green-100 pb-2">
                    <i class="fa-solid fa-user mr-2"></i> Személyes adatok
                </h2>
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- 2. Kártya: Jelszó módosítás -->
        <div class="p-4 sm:p-8 bg-white shadow-lg sm:rounded-xl border border-green-100">
            <div class="max-w-xl">
                <h2 class="text-lg font-medium text-green-900 mb-4 border-b border-green-100 pb-2">
                    <i class="fa-solid fa-key mr-2"></i> Jelszó módosítása
                </h2>
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- 3. Kártya: Fiók törlése (Kicsit pirosas beütés) -->
        <div class="p-4 sm:p-8 bg-red-50 shadow-lg sm:rounded-xl border border-red-100">
            <div class="max-w-xl">
                <h2 class="text-lg font-medium text-red-700 mb-4 border-b border-red-200 pb-2">
                    <i class="fa-solid fa-triangle-exclamation mr-2"></i> Fiók törlése
                </h2>
                @include('profile.partials.delete-user-form')
            </div>
        </div>

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
