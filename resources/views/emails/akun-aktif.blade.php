<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivasi Akun SPMB 2025</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #4e73df;
            margin: 0;
            padding: 0;
        }
        .content {
            padding: 20px 0;
        }
        .credentials {
            background-color: #fff;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #4e73df;
            margin: 20px 0;
        }
        .credentials p {
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
        .btn {
            display: inline-block;
            background-color: #4e73df;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>SPMB 2025</h1>
            <p>Sistem Penerimaan Mahasiswa Baru</p>
        </div>
        
        <div class="content">
            <h2>Selamat, Akun Anda Telah Aktif!</h2>
            
            <p>Halo <strong>{{ $siswa->nama_lengkap }}</strong>,</p>
            
            <p>Kami ingin memberitahukan bahwa akun SPMB Anda telah berhasil diaktifkan pada tanggal <strong>{{ $tanggalAktif }}</strong>. Anda sekarang dapat login ke sistem untuk melanjutkan proses pendaftaran.</p>
            
            <div class="credentials">
                <h3>Informasi Login:</h3>
                <p><strong>Email:</strong> {{ $siswa->email }}</p>
                <p><strong>Password:</strong> {{ $password }}</p>
            </div>
            
            <p>Silakan login menggunakan kredensial di atas melalui link berikut:</p>
            <p style="text-align: center;">
                <a href="{{ url('/login') }}" class="btn">Login Sekarang</a>
            </p>
            
            <p><strong>Catatan Penting:</strong></p>
            <ul>
                <li>Untuk keamanan, segera ubah password Anda setelah login pertama kali.</li>
                <li>Simpan informasi ini dengan aman dan jangan bagikan kepada siapapun.</li>
                <li>Jika Anda mengalami kesulitan login, silakan hubungi admin kami.</li>
            </ul>
        </div>
        
        <div class="footer">
            <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
            <p>&copy; {{ date('Y') }} SPMB 2025. Seluruh hak cipta dilindungi.</p>
        </div>
    </div>
</body>
</html> 