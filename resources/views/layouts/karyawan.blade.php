<!-- resources/views/layouts/karyawan.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Karyawan' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Breeze asset -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
            <a href="{{ route('karyawan.dashboard') }}" class="text-gray-700 hover:text-blue-500">Home</a>
            <a href="{{ route('karyawan.jadwal') }}" class="text-gray-700 hover:text-blue-500">Jadwal</a>

            <!-- Profil Dropdown -->
           <!-- Profil Dropdown -->
<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="flex items-center text-gray-700 font-semibold focus:outline-none">
        {{ Auth::user()->nama }}
        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <div x-show="open" @click.away="open = false"
         x-transition
         class="absolute right-0 mt-2 w-80 bg-white shadow-lg rounded-xl z-50 p-5 space-y-4">

        <!-- Profil Header -->
        <div class="flex flex-col items-center text-center">
            <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : 'https://placehold.co/100x100' }}"
                 alt="Foto Profil"
                 class="w-24 h-24 rounded-full shadow border-4 border-white mb-2 object-cover">
            <h3 class="text-lg font-semibold">{{ Auth::user()->nama }}</h3>
            <p class="text-sm text-gray-500 capitalize">{{ Auth::user()->role }}</p>
        </div>

        <!-- Detail -->
        <div class="text-sm space-y-2 text-left">
            <div>
                <p class="text-gray-500">Email</p>
                <p class="font-medium">{{ Auth::user()->email }}</p>
            </div>
            <div>
                <p class="text-gray-500">Telepon</p>
                <p class="font-medium">{{ Auth::user()->nomor_hp ?? '-' }}</p>
            </div>
            <div>
                <p class="text-gray-500">Alamat</p>
                <p class="font-medium">{{ Auth::user()->alamat ?? '-' }}</p>
            </div>
        </div>

        <!-- Aksi -->
        <div class="border-t pt-4 flex flex-col gap-2">
            <a href="{{ route('profile.edit') }}"
               class="block text-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                Edit Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-center bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                    Logout
                </button>
            </form>
        </div>
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
