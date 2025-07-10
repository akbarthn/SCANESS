@extends('layouts.superadmin')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan/Admin</title>
    <style>
        /* Reset and Base Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            line-height: 1.6;
            color: #333;
            padding: 0;
            margin: 0;
        }
        
        /* Container Styles */
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        /* Header Styles */
        .header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }

        .header h1 {
            color: #2c3e50;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header::after {
            content: "";
            display: block;
            width: 80px;
            height: 4px;
            background: #3498db;
            margin: 10px auto;
            border-radius: 2px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
            font-size: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            font-size: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: all 0.3s;
            box-sizing: border-box;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
            background-color: white;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23343434%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 12px;
        }

        /* Button Styles */
        .btn-submit {
            display: inline-block;
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            background-color: #3498db;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        /* File Input Custom Style */
        .file-input-container {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-button {
            display: inline-block;
            padding: 12px 15px;
            cursor: pointer;
            background-color: #f8fafc;
            border: 1px solid #ddd;
            border-radius: 6px;
            color: #555;
            font-size: 15px;
            transition: all 0.3s;
            width: 100%;
            text-align: center;
        }

        .file-input-button:hover {
            background-color: #e9ecef;
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 20px;
            }
            
            .header h1 {
                font-size: 24px;
            }
        }

        /* Footer Note */
        .form-footer-note {
            text-align: center;
            margin-top: 20px;
            color: #7f8c8d;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tambah Data Karyawan / Admin</h1>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>

            <div class="form-group">
                <label for="nomor_hp" class="form-label">Nomor HP</label>
                <input type="text" name="nomor_hp" class="form-control">
            </div>

            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control" required>
                    <option value="" selected disabled>Pilih Role</option>
                    <option value="karyawan">Karyawan</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <div class="form-group">
                <label for="foto" class="form-label">Foto</label>
                <div class="file-input-container">
                    <span class="file-input-button">Pilih File</span>
                    <input type="file" name="foto" id="foto" class="file-input">
                </div>
                <div id="file-name" style="margin-top: 8px; font-size: 14px; color: #7f8c8d;">Belum ada file dipilih</div>
            </div>

            <button type="submit" class="btn-submit">Simpan Data</button>
        </form>

        <div class="form-footer-note">
            * Pastikan semua data yang dimasukkan valid dan benar
        </div>
    </div>

    <script>
        // Script untuk menampilkan nama file yang dipilih
        document.getElementById('foto').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'Belum ada file dipilih';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
</body>
</html>
@endsection