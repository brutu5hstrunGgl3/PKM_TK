<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between">
        <h1 class="font-bold text-lg">Admin Panel</h1>
        <a href="/" class="underline">Lihat Website</a>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
