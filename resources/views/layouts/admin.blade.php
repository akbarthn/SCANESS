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
      <!-- Light Logo -->
      <img src="https://fluxui.dev/img/demo/logo.png" alt="Logo" class="dark:hidden mb-4 w-32">
      <!-- Dark Logo -->
      <img src="https://fluxui.dev/img/demo/dark-mode-logo.png" alt="Logo Dark" class="hidden dark:block mb-4 w-32">

      <!-- Search -->
      <div class="relative mb-4">
        <input type="text" placeholder="Search..." class="w-full px-3 py-2 rounded-md bg-zinc-100 dark:bg-zinc-800 text-sm focus:outline-none focus:ring focus:ring-blue-500">
        <div class="absolute right-2 top-2 text-zinc-500">
          🔍
        </div>
      </div>

      <!-- Navigation -->
      <nav class="flex flex-col gap-1">
        <a href="#" class="flex items-center gap-2 px-3 py-2 rounded-md bg-zinc-200 dark:bg-zinc-700 font-semibold">
          🏠 Home
        </a>
        <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">
          📥 Inbox <span class="ml-auto text-xs bg-blue-500 text-white px-2 py-0.5 rounded-full">12</span>
        </a>
        <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">📄 Documents</a>
        <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">📅 Calendar</a>

        <div class="mt-4">
          <div class="text-xs uppercase text-zinc-500 mb-1">Favorites</div>
          <a href="#" class="block px-3 py-2 text-sm hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">Marketing site</a>
          <a href="#" class="block px-3 py-2 text-sm hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">Android app</a>
          <a href="#" class="block px-3 py-2 text-sm hover:bg-zinc-100 dark:hover:bg-zinc-800 rounded-md">Brand guidelines</a>
        </div>
      </nav>
    </div>

    <div class="mt-auto p-4">
      <a href="#" class="block px-3 py-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800">⚙ Settings</a>
      <a href="#" class="block px-3 py-2 rounded-md hover:bg-zinc-100 dark:hover:bg-zinc-800">ℹ Help</a>
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
      <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Good afternoon, Olivia</h1>
      <p class="mt-2 text-base text-zinc-600 dark:text-zinc-300">Here's what's new today</p>
      <hr class="mt-4 border-zinc-200 dark:border-zinc-700" />
    </main>

  </div>

</body>
