@extends('layouts.karyawan')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800">Jadwal</h1>

    <!-- Jadwal Tabel -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mt-4">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-700">Daftar Jadwal</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Hari</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Shift</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($jadwal as $jadwal)
                        <tr data-date="{{ $jadwal->tanggal }}" class="cursor-pointer hover:bg-gray-50 transition-all" onclick="showScanner('{{ $jadwal->tanggal }}', '{{ $jadwal->shift->nama }}')">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('l') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">{{ $jadwal->shift->nama }} ({{ $jadwal->masuk }} - {{ $jadwal->keluar }})</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Belum Absen</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- QR Scanner Modal -->
    <div id="qrScanner" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-4 rounded-lg shadow-lg w-96">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Scan QR Code</h2>
            <video id="qr-video" class="w-full mb-4"></video>
            <button onclick="closeScanner()" class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600">Tutup</button>
        </div>
    </div>

    <!-- QR Code Scanner Script -->
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script>
        let scannerVisible = false;
        let videoElement = document.getElementById('qr-video');
        let scannerElement = document.getElementById('qrScanner');

        function showScanner(tanggal, shift) {
            if (!scannerVisible) {
                scannerVisible = true;
                scannerElement.classList.remove('hidden');
                initQRScanner(tanggal, shift);
            }
        }

        function closeScanner() {
            if (scannerVisible) {
                scannerVisible = false;
                scannerElement.classList.add('hidden');
                videoElement.srcObject = null; // Stop the video stream
            }
        }

        function initQRScanner(tanggal, shift) {
            const constraints = {
                video: { facingMode: "environment" }
            };

            navigator.mediaDevices.getUserMedia(constraints)
                .then(function(stream) {
                    videoElement.srcObject = stream;
                    videoElement.setAttribute('playsinline', true);
                    videoElement.play();

                    requestAnimationFrame(scanQRCode);
                })
                .catch(function(error) {
                    console.error("Error accessing camera: ", error);
                });

            function scanQRCode() {
                if (videoElement.srcObject) {
                    let canvas = document.createElement("canvas");
                    let context = canvas.getContext("2d");
                    canvas.height = videoElement.videoHeight;
                    canvas.width = videoElement.videoWidth;
                    context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
                    let imageData = context.getImageData(0, 0, canvas.width, canvas.height);
                    let code = jsQR(imageData.data, canvas.width, canvas.height);

                    if (code) {
                        alert('QR Code detected: ' + code.data);
                        closeScanner();
                    } else {
                        requestAnimationFrame(scanQRCode);
                    }
                }
            }
        }
    </script>
@endsection

<style>
    /* QR Scanner Modal */
    #qrScanner {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }
    .hidden {
        opacity: 0;
        transform: scale(0.95);
        pointer-events: none;
    }
    .visible {
        opacity: 1;
        transform: scale(1);
        pointer-events: auto;
    }
</style>
