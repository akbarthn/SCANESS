<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-lg font-bold text-gray-800">
                Admin Absensi Café
            </div>
        </div>
    </nav>

    <main class="py-6">
        @yield('content')
    </main>
</body>
</html>
