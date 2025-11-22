<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kapcsolat - Védett Állatok</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-green-50 text-gray-800 font-sans flex flex-col min-h-screen">

<!-- Navigáció -->
<nav class="bg-green-800 text-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center gap-2">
            <i class="fa-solid fa-leaf"></i>
            <span class="text-xl font-semibold tracking-wide">Természetvédelem</span>
        </div>

        <div class="space-x-6 text-sm font-medium">
            <a href="{{ url('/') }}" class="hover:text-green-200 transition">Főoldal</a>
            <a href="{{ route('allat.index') }}" class="hover:text-green-200 transition">Adatbázis</a>
            <a href="{{ route('kapcsolat.index') }}" class="text-green-200 underline">Kapcsolat</a>

            @auth
                <a href="{{ url('/dashboard') }}" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-gray-100 transition">Vezérlőpult</a>
            @else
                <a href="{{ route('login') }}" class="hover:text-green-200 transition">Belépés</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Fő Tartalom -->
<main class="flex-grow container mx-auto px-4 py-10">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="bg-green-700 py-4 px-6">
            <h2 class="text-2xl font-bold text-white">Lépj kapcsolatba velünk!</h2>
            <p class="text-green-100 text-sm">Kérdésed van egy védett fajjal kapcsolatban? Írj nekünk!</p>
        </div>

        <div class="p-6 md:p-8">
            <!-- Sikerüzenet -->
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
                    <p class="font-bold">Siker!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Űrlap -->
            <form action="{{ route('kapcsolat.store') }}" method="POST">
                @csrf <!-- Ez védi az űrlapot (CSFR token) - KÖTELEZŐ! -->

                <!-- Név Mező -->
                <div class="mb-6">
                    <label for="nev" class="block text-gray-700 text-sm font-bold mb-2">Teljes Név</label>
                    <input type="text" name="nev" id="nev" value="{{ old('nev') }}"
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('nev') border-red-500 @enderror"
                           placeholder="Pl. Kovács János">
                    @error('nev')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Mező -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Cím</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                           class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror"
                           placeholder="pelda@email.hu">
                    @error('email')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Üzenet Mező -->
                <div class="mb-6">
                    <label for="szoveg" class="block text-gray-700 text-sm font-bold mb-2">Üzenet</label>
                    <textarea name="szoveg" id="szoveg" rows="5"
                              class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 @error('szoveg') border-red-500 @enderror"
                              placeholder="Írd ide az üzeneted...">{{ old('szoveg') }}</textarea>
                    @error('szoveg')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Küldés Gomb -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-6 rounded-lg shadow transition duration-200 transform hover:-translate-y-0.5">
                        <i class="fa-solid fa-paper-plane mr-2"></i> Üzenet Elküldése
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<!-- Lábléc -->
<footer class="bg-green-900 text-green-100 text-center py-6 mt-auto">
    <div class="container mx-auto">
        <p class="font-medium">&copy; {{ date('Y') }} Védett Állatok Nyilvántartása</p>
    </div>
</footer>

</body>
</html>
