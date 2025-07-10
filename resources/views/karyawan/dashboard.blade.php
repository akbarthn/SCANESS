@extends('layouts.karyawan')

@section('content')
<div class="min-h-screen bg-gray-100 font-semibold py-8">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Dashboard</h1>
        <p class="text-gray-600 mb-8">Selamat datang di sistem informasi karyawan</p>

        <!-- Profile Card -->
        <div class="max-w-4xl mx-auto bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="py-6 px-8">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    <!-- Profile Picture -->
                    <div class="w-36 h-36 rounded-full overflow-hidden border-4 border-white shadow-md mx-auto md:mx-0">
                        <img src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : '' }}" alt="Foto profil karyawan"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Profile Info -->
                    <div class="flex-1 w-full">
                        <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ Auth::user()->nama }}</h2>
                        <p class="text-gray-500 mb-4">{{ Auth::user()->role }}</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div class="p-3 rounded-lg border border-gray-200 hover:bg-gray-50 transition text-left">
                                <p class="text-xs text-gray-500">Email</p>
                                <p class="font-medium">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="p-3 rounded-lg border border-gray-200 hover:bg-gray-50 transition text-left">
                                <p class="text-xs text-gray-500">Telepon</p>
                                <p class="font-medium">{{ Auth::user()->nomor_hp ?? '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alamat Section -->
                <div class="mt-6 border-t pt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-3">Alamat</h3>
                    <div class="bg-gray-50 p-4 rounded-lg text-left">
                        <p class="text-gray-700 whitespace-pre-line">{{ Auth::user()->alamat }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

