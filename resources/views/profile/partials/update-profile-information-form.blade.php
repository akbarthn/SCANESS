@if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <!-- Foto Profil -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Foto Profil</label>
        <!-- Preview Foto Profil -->
        <img id="preview-foto"
             src="{{ Auth::user()->foto ? asset('storage/' . Auth::user()->foto) : '' }}"
             alt="Preview Foto Profil"
             class="w-24 h-24 rounded-full mt-2 mb-2 object-cover"
             style="{{ Auth::user()->foto ? '' : 'display:none;' }}">
        <!-- Input File Foto -->
        <input type="file" name="foto" id="input-foto" class="mt-1 block w-full border rounded p-2" accept="image/*">
        @error('foto')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nama -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="nama" value="{{ old('nama', Auth::user()->nama) }}"
               class="mt-1 block w-full border rounded p-2" required>
        @error('nama')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
               class="mt-1 block w-full border rounded p-2" required>
        @error('email')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Telepon -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Telepon</label>
        <input type="text" name="nomor_hp" value="{{ old('nomor_hp', Auth::user()->nomor_hp) }}"
               class="mt-1 block w-full border rounded p-2">
        @error('nomor_hp')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Alamat -->
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea name="alamat" rows="3"
                  class="mt-1 block w-full border rounded p-2">{{ old('alamat', Auth::user()->alamat) }}</textarea>
        @error('alamat')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tombol Submit -->
    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Simpan
    </button>
</form>

<script>
document.getElementById('input-foto').addEventListener('change', function(event) {
    const [file] = event.target.files;
    const preview = document.getElementById('preview-foto');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
});
</script>
