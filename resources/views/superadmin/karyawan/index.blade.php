<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold">Daftar Karyawan (Total: {{ $totalKaryawan }})</h2>
  </x-slot>

  <div class="mt-4">
    @if($karyawans->isEmpty())
      <p>Belum ada karyawan.</p>
    @else
      <table class="table-auto w-full">
        <thead>
          <tr><th>No</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
        </thead>
        <tbody>
          @foreach($karyawans as $index => $k)
          <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->email }}</td>
            <td>
              <a href="{{ route('superadmin.karyawan.edit', $k->id) }}">Edit</a>
              |
              <form action="{{ route('superadmin.karyawan.destroy', $k->id) }}" method="post" class="inline">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
</x-app-layout>
