<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <title>Admin Felület</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

<div class="flex h-screen">
    <!-- Oldalsáv -->
    <div class="w-64 bg-green-900 text-white flex flex-col">
        <div class="p-6 text-2xl font-bold text-center border-b border-green-800">
            Admin Panel
        </div>
        <nav class="flex-grow p-4">
            <a href="{{ route('admin.index') }}" class="block py-2 px-4 bg-green-800 rounded mb-2">Vezérlőpult</a>
            <a href="{{ url('/') }}" class="block py-2 px-4 hover:bg-green-700 rounded text-gray-300">
                <i class="fa-solid fa-arrow-left"></i> Vissza a Főoldalra
            </a>
        </nav>
    </div>

    <!-- Tartalom -->
    <div class="flex-1 p-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Üdvözöllek, Admin!</h1>
        <div class="bg-white p-6 rounded shadow border-l-4 border-green-600">
            <p class="text-gray-600">Ez a felület csak adminisztrátorok számára érhető el.</p>
            <p class="mt-2">Itt lehet majd kezelni a felhasználókat vagy statisztikákat.</p>
        </div>
    </div>
</div>

</body>
</html>
