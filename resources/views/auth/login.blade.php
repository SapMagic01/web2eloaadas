<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bejelentkezés - Természetvédelem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-green-50 text-gray-800 font-sans flex flex-col justify-center items-center min-h-screen py-6">

<!-- Logó -->
<div class="text-center mb-8">
    <a href="{{ url('/') }}" class="flex flex-col items-center gap-2 group">
        <div class="bg-green-700 text-white p-4 rounded-full shadow-lg group-hover:bg-green-800 transition transform group-hover:scale-110 duration-300">
            <i class="fa-solid fa-leaf text-3xl"></i>
        </div>
        <span class="text-2xl font-bold text-green-900 mt-3">Természetvédelem</span>
    </a>
</div>

<!-- Kártya -->
<div class="w-full max-w-md bg-white rounded-xl shadow-xl overflow-hidden border border-green-100">
    <div class="bg-green-700 py-4 px-6 text-center">
        <h2 class="text-xl font-bold text-white">Üdvözlünk újra!</h2>
        <p class="text-green-100 text-sm">Jelentkezz be a fiókodba.</p>
    </div>

    <div class="p-8">
        <!-- Session Status (pl. sikeres jelszó reset után) -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf <!-- EZ A KULCS A 419-ES HIBA ELKERÜLÉSÉHEZ! -->

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Cím</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                           placeholder="pelda@email.hu">
                </div>
                @error('email')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jelszó -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Jelszó</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <input id="password" type="password" name="password" required
                           class="w-full pl-10 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                           placeholder="********">
                </div>
                @error('password')
                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Emlékezz rám -->
            <div class="block mb-6">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                    <span class="ml-2 text-sm text-gray-600">Emlékezz rám</span>
                </label>
            </div>

            <!-- Gombok -->
            <div class="flex flex-col gap-4">
                <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white font-bold py-3 px-4 rounded-lg shadow transition duration-200 transform hover:-translate-y-0.5">
                    Belépés
                </button>

                <div class="text-center text-sm text-gray-600">
                    Nincs még fiókod?
                    <a href="{{ route('register') }}" class="text-green-700 hover:text-green-900 font-bold hover:underline">
                        Regisztrálj itt
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<div class="mt-8 text-center text-gray-500 text-sm">
    &copy; {{ date('Y') }} Védett Állatok Nyilvántartása
</div>

</body>
</html>
