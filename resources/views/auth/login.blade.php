<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - SPMB 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .back-to-home {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            display: flex;
            justify-content: flex-start;
            width: auto;
        }
        
        .btn-home {
            background-color: #fff;
            color: #0d6efd;
            border: 1px solid #0d6efd;
            border-radius: 50px;
            padding: 8px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        
        .btn-home:hover {
            background-color: #0d6efd;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        @media (max-width: 576px) {
            .back-to-home {
                top: 10px;
                left: 0;
                right: 0;
                width: 100vw;
                justify-content: center;
            }
            .btn-home {
                padding: 0;
                font-size: 1.2rem;
                border-radius: 50%;
                width: 44px;
                height: 44px;
                justify-content: center;
                align-items: center;
                display: flex;
            }
            .btn-home span {
                display: none;
            }
            .btn-home i {
                margin: 0 !important;
                display: block;
                text-align: center;
                width: 100%;
                height: 100%;
                line-height: 44px;
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body class="bg-light">
    <!-- Tombol Kembali ke Home -->
    <div class="back-to-home">
        <a href="{{ route('home') }}" class="btn btn-home">
            <i class="fas fa-home me-1"></i><span> Kembali ke Home</span>
        </a>
    </div>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg" style="width: 100%; max-width: 450px;">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="mb-0"><i class="fas fa-graduation-cap me-2"></i>SPMB 2025</h4>
                <p class="small mb-0 mt-1">Sistem Penerimaan Mahasiswa Baru</p>
            </div>
            <div class="card-body p-4">
                <div class="alert alert-info mb-4">
                    <i class="fas fa-info-circle me-2"></i> Siswa dapat login menggunakan email dan password yang telah didaftarkan oleh admin.
                </div>
                
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan email anda" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password anda"
                            required>
                        </div>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Ingat saya</label>
                    </div>

                    <div class="d-grid gap-2 mb-3">
                        <button type="submit" class="btn btn-primary py-2">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </div>

                    <!-- <div class="text-center">
                        <p class="mb-0">Belum memiliki akun? <a href="{{ route('register') }}"
                                class="text-decoration-none">Daftar</a></p>
                    </div> -->
                </form>
            </div>
            <div class="card-footer text-center py-3 bg-light">
                <small class="text-muted">© {{ date('Y') }} SPMB 2025. Hak Cipta Dilindungi.</small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>