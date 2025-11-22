<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Új Állat Felvétele</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-green-50 text-gray-800 font-sans flex flex-col min-h-screen">

<!-- MENÜSOR -->
<nav class="bg-green-800 text-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-2 hover:text-green-200 transition">
            <i class="fa-solid fa-leaf"></i>
            <span class="text-xl font-semibold tracking-wide">Természetvédelem</span>
        </a>
        <div class="space-x-6 text-sm font-medium">
            <a href="{{ route('allat.index') }}" class="hover:text-green-200 transition"><i class="fa-solid fa-arrow-left"></i> Vissza az adatbázishoz</a>
        </div>
    </div>
</nav>

<!-- TARTALOM -->
<main class="flex-grow container mx-auto px-4 py-10 flex justify-center">
    <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg overflow-hidden border border-green-100">
        <div class="bg-green-700 py-4 px-6">
            <h2 class="text-2xl font-bold text-white">Új védett állat rögzítése</h2>
        </div>

        <div class="p-8">
            <!-- ŰRLAP -->
            <!-- Fontos: a route('allat.store') menti el az adatokat -->
            <form action="{{ route('allat.store') }}" method="POST">
                @csrf <!-- Biztonsági token (Kötelező!) -->

                <!-- NÉV -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nev">Állat neve</label>
                    <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 border-gray-300"
                           id="nev" name="nev" type="text" placeholder="Pl. Kerecsensólyom" required>
                </div>

                <!-- ÉV -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="ev">Nyilvántartásba vétel éve</label>
                    <input class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 border-gray-300"
                           id="ev" name="ev" type="number" min="1900" max="2099" value="2024" required>
                </div>

                <!-- KATEGÓRIA (Legördülő lista) -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="katid">Kategória</label>
                    <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 border-gray-300 bg-white"
                            id="katid" name="katid" required>
                        <option value="" disabled selected>Válassz kategóriát...</option>
                        @foreach($kategoriak as $kategoria)
                            <option value="{{ $kategoria->id }}">{{ $kategoria->nev }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- ESZMEI ÉRTÉK (Legördülő lista) -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="ertekid">Eszmei érték</label>
                    <select class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 border-gray-300 bg-white"
                            id="ertekid" name="ertekid" required>
                        <option value="" disabled selected>Válassz értéket...</option>
                        @foreach($ertekek as $ertek)
                            <option value="{{ $ertek->id }}">{{ $ertek->nev }} Ft</option>
                        @endforeach
                    </select>
                </div>

                <!-- GOMBOK -->
                <div class="flex justify-end gap-4">
                    <a href="{{ route('allat.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded transition">
                        Mégse
                    </a>
                    <button type="submit" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-6 rounded shadow transition">
                        Mentés
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

</body>
</html>
