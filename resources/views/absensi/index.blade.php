@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50">
  <div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-3xl font-bold text-gray-800">Daftar Presensi Karyawan</h1>
      <a href="{{ route('absensi.create') }}" 
         class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 flex items-center">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
           <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
         </svg>
         Tambah Presensi
      </a>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gradient-to-r from-blue-600 to-blue-800">
            <tr>
              <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Tanggal</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Karyawan</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Shift</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Jam Masuk</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-left text-xs font-medium text-white uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach($absensis as $a)
            <tr class="hover:bg-gray-50 transition duration-150">
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($a->tanggal)->isoFormat('D MMMM Y') }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                    <span class="text-blue-600 font-medium">{{ substr($a->user->name, 0, 1) }}</span>
                  </div>
                  <div class="ml-4">
                    <div class="font-medium text-gray-900">{{ $a->user->name }}</div>
                    <div class="text-gray-500 text-sm">{{ $a->user->email }}</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                  {{ $a->shift_id ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                  {{ $a->shift->nama_shift ?? '-' }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-gray-500">{{ $a->jam_masuk ?? '-' }}</div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                @php
                  $statusClasses = [
                    'hadir' => 'bg-green-100 text-green-800',
                    'izin' => 'bg-yellow-100 text-yellow-800',
                    'sakit' => 'bg-orange-100 text-orange-800',
                    'alpa' => 'bg-red-100 text-red-800'
                  ];
                @endphp
                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $statusClasses[strtolower($a->status)] ?? 'bg-gray-100 text-gray-800' }}">
                  {{ ucfirst($a->status) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-2">
                  <a href="{{ route('absensi.edit', $a) }}" 
                    class="text-blue-600 hover:text-blue-900 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                    </svg>
                    Edit
                  </a>
                  <form action="{{ route('absensi.destroy', $a) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus data presensi ini?')" 
                      class="text-red-600 hover:text-red-900 flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                      </svg>
                      Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        {{ $absensis->links() }}
      </div>
    </div>
  </div>
</div>
@endsection