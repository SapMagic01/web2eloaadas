<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statisztika - Természetvédelem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js betöltése -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-green-50 text-gray-800 font-sans flex flex-col min-h-screen">

<!-- MENÜSOR -->
<nav class="bg-green-800 text-white shadow-md p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="flex items-center gap-2 hover:text-green-200 transition">
            <i class="fa-solid fa-leaf"></i>
            <span class="text-xl font-semibold tracking-wide">Természetvédelem</span>
        </a>

        <div class="space-x-6 text-sm font-medium flex items-center">
            <a href="{{ url('/') }}" class="hover:text-green-200 transition">Főoldal</a>
            <a href="{{ route('allat.index') }}" class="hover:text-green-200 transition">Adatbázis</a>
            <!-- ÚJ DIAGRAM MENÜPONT -->
            <a href="{{ route('diagram.index') }}" class="text-green-200 underline font-bold">
                <i class="fa-solid fa-chart-pie"></i> Statisztika
            </a>
            <a href="{{ route('kapcsolat.index') }}" class="hover:text-green-200 transition">Kapcsolat</a>

            @auth
                <a href="{{ route('uzenetek.index') }}" class="hover:text-green-200 transition">Üzenetek</a>
                <a href="{{ url('/dashboard') }}" class="bg-white text-green-800 px-3 py-1 rounded hover:bg-gray-100 transition">Vezérlőpult</a>
            @else
                <a href="{{ route('login') }}" class="hover:text-green-200 transition">Belépés</a>
            @endauth
        </div>
    </div>
</nav>

<!-- TARTALOM -->
<main class="flex-grow container mx-auto px-4 py-10">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-green-900">Védett állatok eloszlása</h1>
        <p class="text-gray-600 mt-2">Eszmei érték szerinti csoportosításban</p>
    </div>

    <!-- Diagram tárolója -->
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg border border-green-100">
        <!-- A canvas elem, amire a Chart.js rajzol -->
        <canvas id="myChart"></canvas>
    </div>
</main>

<footer class="bg-green-900 text-green-100 text-center py-6 mt-auto">
    <div class="container mx-auto">
        <p>&copy; {{ date('Y') }} Védett Állatok Nyilvántartása</p>
    </div>
</footer>

<!-- A Script, ami létrehozza a diagramot -->
<script>
    // Adatok átvétele a Laraveltől (JSON formátumban)
    const cimkek = @json($cimkek);
    const adatok = @json($ertekek);

    const ctx = document.getElementById('myChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar', // Típus: 'bar' (oszlop), 'pie' (kör), 'doughnut' (fánk)
        data: {
            labels: cimkek,
            datasets: [{
                label: 'Állatok száma (db)',
                data: adatok,
                backgroundColor: [
                    'rgba(22, 163, 74, 0.6)',  // Zöld
                    'rgba(234, 179, 8, 0.6)',  // Sárga
                    'rgba(220, 38, 38, 0.6)',  // Piros
                    'rgba(37, 99, 235, 0.6)',  // Kék
                    'rgba(147, 51, 234, 0.6)'  // Lila
                ],
                borderColor: [
                    'rgba(22, 163, 74, 1)',
                    'rgba(234, 179, 8, 1)',
                    'rgba(220, 38, 38, 1)',
                    'rgba(37, 99, 235, 1)',
                    'rgba(147, 51, 234, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1 // Hogy csak egész számokat írjon ki a tengelyen
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // Oszlopdiagramnál nem mindig kell jelmagyarázat
                },
                title: {
                    display: true,
                    text: 'Állatok száma eszmei érték kategóriánként'
                }
            }
        }
    });
</script>
</body>
</html><div>
    <!-- Be present above all else. - Naval Ravikant -->
</div>
