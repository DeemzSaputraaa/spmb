<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Siswa Telah Aktif</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .header {
            background-color: #4e73df;
            color: #fff;
            padding: 15px;
            text-align: center;
            border-radius: 5px 5px 0 0;
            margin-bottom: 20px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
        .info-box {
            background-color: #f8f9fc;
            border-left: 4px solid #4e73df;
            padding: 15px;
            margin-bottom: 20px;
        }
        .credential-item {
            margin-bottom: 10px;
        }
        .credential-label {
            font-weight: bold;
            color: #4e73df;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Akun Siswa Telah Aktif</h2>
        </div>
        
        <p>Halo <strong>{{ $siswa->nama_lengkap }}</strong>,</p>
        
        <p>Selamat! Akun siswa Anda telah berhasil dibuat dan diaktifkan pada tanggal <strong>{{ $siswa->created_at->format('d F Y') }}</strong>.</p>
        
        <p>Berikut adalah informasi akun Anda:</p>
        
        <div class="info-box">
            <div class="credential-item">
                <span class="credential-label">NISN:</span> {{ $siswa->nisn }}
            </div>
            <div class="credential-item">
                <span class="credential-label">Email:</span> {{ $siswa->email }}
            </div>
            <div class="credential-item">
                <span class="credential-label">Password:</span> {{ $password }}
            </div>
        </div>
        
        <p>Silakan gunakan informasi di atas untuk login ke sistem dengan mengakses halaman login di website kami.</p>
        
        <p><strong>Catatan Penting:</strong></p>
        <ul>
            <li>Harap simpan informasi ini dengan aman dan jangan bagikan dengan orang lain.</li>
            <li>Kami menyarankan untuk segera mengganti password Anda setelah login pertama kali.</li>
        </ul>
        
        <p>Jika Anda memiliki pertanyaan atau kesulitan dalam mengakses akun, silakan hubungi administrator kami.</p>
        
        <p>Terima kasih.</p>
        
        <div class="footer">
            <p>© {{ date('Y') }} Sistem Pendaftaran Mahasiswa Baru</p>
        </div>
    </div>
</body>
</html> 