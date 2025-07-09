<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <!-- Foto -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
        @if(Auth::user()->foto)
            <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profil"
                 class="w-24 h-24 rounded-full mt-2 mb-2 object-cover">
        @endif
        <input type="file" name="foto" class="mt-1 block w-full border rounded p-2">
    </div>

    <!-- Nama -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="nama" value="{{ old('nama', Auth::user()->nama) }}"
               class="mt-1 block w-full border rounded p-2" required>
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
               class="mt-1 block w-full border rounded p-2" required>
    </div>

    <!-- Telepon -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Telepon</label>
        <input type="text" name="nomor_hp" value="{{ old('nomor_hp', Auth::user()->nomor_hp) }}"
               class="mt-1 block w-full border rounded p-2">
    </div>

    <!-- Alamat -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea name="alamat" rows="3"
                  class="mt-1 block w-full border rounded p-2">{{ old('alamat', Auth::user()->alamat) }}</textarea>
    </div>

    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Simpan Perubahan
    </button>
</form>
