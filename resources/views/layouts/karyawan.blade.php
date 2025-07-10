<!-- resources/views/layouts/karyawan.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Karyawan' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Breeze asset -->
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <!-- Kiri: Nama Aplikasi -->
        <div class="text-xl font-bold text-gray-800">
            AbsensiKafe
        </div>

        <!-- Kanan: Navigasi & Profil -->
        <div class="flex items-center space-x-6">
            <!-- Navigasi -->
            <a href="{{ route('karyawan.home') }}" class="text-gray-700 hover:text-blue-500">Home</a>
            <a href="{{ route('karyawan.jadwal') }}" class="text-gray-700 hover:text-blue-500">Jadwal</a>

            <!-- Profil Dropdown -->
            <div class="relative group">
                <button class="flex items-center text-gray-700 font-semibold focus:outline-none">
                    {{ Auth::user()->nama }}
                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="absolute hidden group-hover:block right-0 mt-2 w-48 bg-white shadow-md rounded z-10">
                    <div class="px-4 py-2 border-b">
                        <p class="font-bold">{{ Auth::user()->nama }}</p>
                        <p class="text-sm text-gray-600 capitalize">{{ Auth::user()->role }}</p>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="p-6">
        @yield('content')
    </main>
</body>
</html>
