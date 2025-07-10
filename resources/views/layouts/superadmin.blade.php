<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Karyawan' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Breeze asset -->
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800 flex">

  <!-- Sidebar -->
  <aside class="w-64 bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700 hidden lg:flex flex-col min-h-screen">
    <div class="flex items-center justify-between p-4 lg:hidden">
      <button class="text-zinc-600 dark:text-zinc-300">
        <!-- X Mark Icon -->
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

    <div class="p-4">
      <!-- Navigation -->
      <nav class="flex flex-col gap-1">
      <a href="{{ route('superadmin.dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-md bg-zinc-200 dark:bg-zinc-700 font-semibold">
      🏠 Home
      </a>
      
        <!-- Super Admin Menu -->
        @if(Auth::user() && Auth::user()->role === 'superadmin')
          <a href="{{ route('karyawan.index') }}" class="flex items-center gap-2 px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">
            👤 Kelola Karyawan
          </a>
          <a href="{{ route('shift.index') }}" class="flex items-center gap-2 px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">
            🔁 Kelola Shift
          </a>
          <a href="{{ route('jadwal.index') }}" class="flex items-center gap-2 px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">
            📅 Kelola Jadwal
          </a>
        @endif

        <!-- Logout -->
        <div class="mt-8">
          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition">
                  Logout
              </button>
          </form>
        </div>
      </nav>
    </div>
  </aside>

  <!-- Main Content -->
  <div class="flex-1 flex flex-col">

    <!-- Header -->
    <header class="flex items-center justify-between p-4 lg:hidden border-b border-zinc-200 dark:border-zinc-700">
      <button class="text-zinc-600 dark:text-zinc-300">
        <!-- Bars Icon -->
        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>

      <div class="relative">
        <img class="w-8 h-8 rounded-full" src="https://fluxui.dev/img/demo/user.png" alt="User avatar">
        <!-- Add dropdown if needed -->
      </div>
    </header>

    <!-- Main Area -->
    <main class="p-6">
    @yield('content')
    </main>
  </div>
</body>
</html>
