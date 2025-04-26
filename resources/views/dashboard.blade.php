<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPMB Online 2025 - Sistem Penerimaan Murid Baru</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom Styles */
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        /* Container adjustments */
        .container {
            padding-left: 15px;
            padding-right: 15px;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        @media (min-width: 1400px) {
            .container {
                max-width: 1320px;
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        /* Text styles */
        .text-primary {
            color: var(--primary-color) !important;
        }

        .display-4 {
            font-size: 2.5rem;
            line-height: 1.2;
        }

        .lead {
            font-size: 1.15rem;
        }

        .section-title {
            font-size: clamp(1.5rem, 3vw, 2rem);
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .section-subtitle {
            font-size: clamp(0.9rem, 1.5vw, 1.125rem);
            color: #777;
            margin-bottom: 40px;
        }

        /* Responsive text sizes */
        @media (max-width: 767.98px) {
            .display-4 {
                font-size: 2rem;
            }

            .lead {
                font-size: 1rem;
            }
        }

        /* Navbar Styles - Improved for mobile */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.75rem 1rem;
        }

        .navbar-brand img {
            height: 40px;
            width: auto;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
            width: 1.25em;
            height: 1.25em;
        }

        .nav-link {
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
            padding: 0.5rem 1rem;
            color: #212529 !important;
        }

        .nav-link.active {
            font-weight: 600;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: var(--primary-color);
            bottom: 0;
            left: 0;
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                padding: 1rem 0;
            }

            .nav-item {
                margin: 0.25rem 0;
            }

            .nav-link {
                padding: 0.5rem 0;
            }
        }

        @media (min-width: 992px) {
            .nav-item {
                margin-left: 0.5rem;
                margin-right: 0.5rem;
            }
        }

        /* Button Styles */
        .btn {
            border-radius: 4px;
            transition: all 0.3s ease;
            padding: 0.5rem 1.25rem;
            font-size: 1rem;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1.1rem;
        }

        /* Hero Section - Improved responsiveness */
        .hero-section {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 5rem 0;
            position: relative;
        }

        .hero-text {
            position: relative;
            z-index: 2;
            padding: 1rem 0;
        }

        .hero-image {
            max-height: 100%;
            width: 100%;
            object-fit: contain;
            border-radius: 0.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 767.98px) {
            .hero-section {
                min-height: auto;
                padding: 6rem 0 3rem;
                text-align: center;
            }

            .hero-section h1 {
                font-size: 1.8rem !important;
            }

            .hero-section .lead {
                font-size: 1rem !important;
            }

            .hero-image {
                max-height: 300px;
                margin-top: 2rem;
            }

            .d-flex {
                justify-content: center !important;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .hero-section h1 {
                font-size: 2.2rem !important;
            }

            .hero-image {
                max-height: 350px;
            }
        }

        /* Feature Cards - Improved grid */
        .feature-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(13, 110, 253, 0.1);
            color: var(--primary-color);
            border-radius: 50%;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .hover-card {
            transition: all 0.3s ease;
            border: 1px solid #e9e9e9;
            z-index: 1;
            height: 100%;
            margin-bottom: 1.5rem;
        }

        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            background-color: var(--primary-color);
            color: white !important;
        }

        .hover-card:hover h3,
        .hover-card:hover p,
        .hover-card:hover span {
            color: white !important;
        }

        /* Service List - Better mobile layout */
        .service-list li {
            margin-bottom: 1.25rem;
            font-size: 1rem;
        }

        @media (max-width: 767.98px) {
            .service-list li {
                font-size: 0.95rem;
            }
        }

        /* Testimonial Section - Improved for mobile */
        .testimonial-section {
            padding: 3rem 0;
        }

        .testimonial-card {
            height: 100%;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 767.98px) {
            .carousel-item .col-lg-5 {
                margin-bottom: 1.5rem;
            }
        }

        /* Contact Section - Better mobile layout */
        .contact-item {
            margin-bottom: 1.5rem;
        }

        /* Footer - Better spacing */
        footer {
            padding: 2rem 0;
        }

        /* Utility classes */
        .min-vh-80 {
            min-height: 80vh;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .shadow-lg {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Action Area - Better button placement */
        .action-area {
            padding: 3rem 0;
        }

        .action-area h3 {
            font-size: clamp(1.2rem, 2vw, 1.5rem);
        }

        @media (max-width: 767.98px) {
            .action-area .btn {
                width: 100%;
                margin-top: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img src="/images/logo.png" alt="SPMB Logo" class="d-inline-block align-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#harga">Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#hubungi">Hubungi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jadwal">Jadwal</a>
                    </li>
                    <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                        <a class="btn btn-primary text-white fw-bold px-4 py-2"
                            href="{{ route('login') }}">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section" style="background-image: url('{{ asset('images/slider-bg.png') }}');">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <!-- Text content - Left side -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="hero-text text-center text-lg-start">
                        <h1 class="text-white mb-3 fw-bold display-4">SPMB Online 2025<br>Untuk semua tingkat sekolah.
                        </h1>
                        <p class="text-white mb-4 mb-lg-5 lead">
                            Sistem Penerimaan Murid Baru Secara Mandiri oleh Sekolah.
                        </p>
                        <div class="d-flex gap-3 flex-wrap justify-content-center justify-content-lg-start">
                            <a href="#" class="btn btn-outline-light px-4 py-2 fw-bold">START NOW</a>
                            <a href="#" class="btn btn-light text-primary px-4 py-2 fw-bold">CONTACT US</a>
                        </div>
                    </div>
                </div>

                <!-- Image content - Right side -->
                <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                    <img src="{{ asset('images/atas.jpg') }}" alt="SPMB Illustration"
                        class="img-fluid rounded-lg shadow-lg hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="layanan" class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="fw-bold mb-3">Keunggulan SPMB Online 2025</h2>
                        <p class="lead text-muted">Sistem Penerimaan Murid Baru Online adalah platform digital yang
                            dirancang untuk menyederhanakan dan mempercepat proses pendaftaran siswa baru secara
                            efisien.</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Box 1 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card h-100 overflow-hidden border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                <span class="lnr lnr-select fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Langsung Pakai</h3>
                            <p class="text-muted mb-0 flex-grow-1">Sekolah tidak perlu menyiapkan dan mensetting
                                teknologi tinggi, setelah berlangganan bisa langsung digunakan.</p>
                        </div>
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card h-100 overflow-hidden border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                <span class="lnr lnr-rocket fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Kecepatan Tinggi</h3>
                            <p class="text-muted mb-0 flex-grow-1">Website dapat melayani pengguna secara cepat, baik
                                calon siswa maupun sekolah penerima.</p>
                        </div>
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card h-100 overflow-hidden border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                <span class="lnr lnr-phone fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">24/7 Support</h3>
                            <p class="text-muted mb-0 flex-grow-1">Layanan pendukung bila ada gangguan selama 24 jam
                                seminggu melalui chatting dan telpon.</p>
                        </div>
                    </div>
                </div>

                <!-- Box 4 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card h-100 overflow-hidden border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                <span class="lnr lnr-tag fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Harga Terjangkau</h3>
                            <p class="text-muted mb-0 flex-grow-1">Dengan harga terjangkau kami memberikan layanan
                                berkualitas prima.</p>
                        </div>
                    </div>
                </div>

                <!-- Box 5 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card h-100 overflow-hidden border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                <span class="lnr lnr-laptop-phone fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Mudah Diakses</h3>
                            <p class="text-muted mb-0 flex-grow-1">Mudah diakses oleh semua perangkat baik komputer
                                maupun smartphone hanya melalui website tanpa melakukan install aplikasi.</p>
                        </div>
                    </div>
                </div>

                <!-- Box 6 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card h-100 overflow-hidden border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                <span class="lnr lnr-book fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Sesuai Regulasi Resmi</h3>
                            <p class="text-muted mb-0 flex-grow-1">Sistem sudah sesuai dengan peraturan pemerintah
                                tentang SPMB 2025.</p>
                        </div>
                    </div>
                </div>

                <!-- Box 7 -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card h-100 overflow-hidden border-0 shadow-sm hover-card">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <div class="mb-3">
                                <span class="lnr lnr-file-empty fs-1 text-primary"></span>
                                <span class="lnr lnr-checkmark-circle fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Sistem Pelaporan Otomatis</h3>
                            <p class="text-muted mb-0 flex-grow-1">Setiap data yang dinput akan diproses untuk
                                menghasilkan sistem tabulasi otomatis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Action Section -->
    <section id="action" class="action-area py-5 bg-primary">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-8 mb-3 mb-md-0">
                    <h3 class="text-white mb-0">Daftarkan Segera Bersama Kami untuk Kemudahan Layanan<br>Pendaftaran di
                        Sekolah Anda</h3>
                </div>
                <div class="col-lg-3 col-md-4 text-md-end text-center">
                    <a href="#" class="btn btn-light btn-lg px-4 py-2 fw-bold">GET IT NOW</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Service Section -->
    <section id="service" class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="fw-bold">Kemudahan yang Diperoleh</h2>
                    <div class="mx-auto"
                        style="width: 80px; height: 3px; background-color: #0d6efd; margin: 20px auto;"></div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6 order-md-1 order-2">
                    <ul class="list-unstyled service-list">
                        <li class="mb-3 d-flex align-items-start">
                            <span class="lnr lnr-checkmark-circle me-3 text-primary" style="font-size: 1.5rem;"></span>
                            <span>Halaman pendaftaran Calon siswa online</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <span class="lnr lnr-checkmark-circle me-3 text-primary" style="font-size: 1.5rem;"></span>
                            <span>Melayani semua jalur calon siswa</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <span class="lnr lnr-checkmark-circle me-3 text-primary" style="font-size: 1.5rem;"></span>
                            <span>Setiap sekolah mendapatkan alamat domain & aplikasi SPMB Online 2025</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <span class="lnr lnr-checkmark-circle me-3 text-primary" style="font-size: 1.5rem;"></span>
                            <span>Jumlah calon siswa pendaftar tidak terbatas</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <span class="lnr lnr-checkmark-circle me-3 text-primary" style="font-size: 1.5rem;"></span>
                            <span>Jumlah akses admin sekolah tidak dibatasi</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <span class="lnr lnr-checkmark-circle me-3 text-primary" style="font-size: 1.5rem;"></span>
                            <span>Tersedia berbagai metode verifikasi pendaftaran, baik secara online maupun tatap
                                muka</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <span class="lnr lnr-checkmark-circle me-3 text-primary" style="font-size: 1.5rem;"></span>
                            <span>Sistem menyediakan fitur pelaporan, termasuk laporan pendaftaran dan hasil
                                seleksi.</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 order-md-2 order-1 mb-4 mb-md-0">
                    <img src="{{ asset('images/bawah.jpg') }}" alt="Kemudahan SPMB Online"
                        class="img-fluid rounded shadow-lg w-100">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimoni" class="testimonial-section py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Testimoni</h2>
                <p class="section-subtitle">Pengalaman Pengguna</p>
            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Page 1 -->
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <!-- Testimonial 1 -->
                            <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                                <div class="testimonial-card bg-white p-4 rounded shadow-sm">
                                    <div
                                        class="avatar-circle bg-light d-flex align-items-center justify-content-center mx-auto">
                                        <i class="bi bi-building text-muted fs-3"></i>
                                    </div>
                                    <h4 class="school-name text-center">SMAN 1 Jakarta</h4>
                                    <div class="stars text-center">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonial-text text-center">"Mudah digunakan dan sangat membantu"</p>
                                </div>
                            </div>

                            <!-- Testimonial 2 -->
                            <div class="col-lg-5 col-md-6">
                                <div class="testimonial-card bg-white p-4 rounded shadow-sm">
                                    <div
                                        class="avatar-circle bg-light d-flex align-items-center justify-content-center mx-auto">
                                        <i class="bi bi-building text-muted fs-3"></i>
                                    </div>
                                    <h4 class="school-name text-center">SMPN 2 Jakarta Timur</h4>
                                    <div class="stars text-center">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonial-text text-center">"Calon Siswa sangat terbantu"</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Page 2 -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <!-- Testimonial 3 -->
                            <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                                <div class="testimonial-card bg-white p-4 rounded shadow-sm">
                                    <div
                                        class="avatar-circle bg-light d-flex align-items-center justify-content-center mx-auto">
                                        <i class="bi bi-building text-muted fs-3"></i>
                                    </div>
                                    <h4 class="school-name text-center">SMA 3 Bandung</h4>
                                    <div class="stars text-center">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonial-text text-center">"Sangat praktis untuk pendaftaran online"
                                    </p>
                                </div>
                            </div>

                            <!-- Testimonial 4 -->
                            <div class="col-lg-5 col-md-6">
                                <div class="testimonial-card bg-white p-4 rounded shadow-sm">
                                    <div
                                        class="avatar-circle bg-light d-flex align-items-center justify-content-center mx-auto">
                                        <i class="bi bi-building text-muted fs-3"></i>
                                    </div>
                                    <h4 class="school-name text-center">SMKN 1 Surabaya</h4>
                                    <div class="stars text-center">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonial-text text-center">"Proses pendaftaran menjadi lebih efisien"
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-primary rounded-circle p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="hubungi" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Hubungi Kami</h2>
                <div class="mx-auto" style="width: 80px; height: 3px; background-color: #0d6efd; margin: 15px auto;">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="bg-white p-4 p-lg-5 rounded shadow-sm">
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6 mb-4 mb-md-0">
                                <!-- Address -->
                                <div class="contact-item d-flex mb-4">
                                    <div class="contact-icon me-4 text-primary">
                                        <span class="lnr lnr-home fs-3"></span>
                                    </div>
                                    <div class="contact-content">
                                        <p class="mb-1">1502 N Elm St, Fairmont, MN</p>
                                        <p class="mb-0">56031 United States</p>
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="contact-item d-flex">
                                    <div class="contact-icon me-4 text-primary">
                                        <span class="lnr lnr-phone fs-3"></span>
                                    </div>
                                    <div class="contact-content">
                                        <p class="mb-1">+00 123.456-789</p>
                                        <p class="mb-0">+00 123.456-789</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <!-- Email -->
                                <div class="contact-item d-flex mb-4">
                                    <div class="contact-icon me-4 text-primary">
                                        <span class="lnr lnr-envelope fs-3"></span>
                                    </div>
                                    <div class="contact-content">
                                        <p class="mb-1">email@yourdomain.com</p>
                                        <p class="mb-0">email@yourdomain.com</p>
                                    </div>
                                </div>

                                <!-- Website -->
                                <div class="contact-item d-flex">
                                    <div class="contact-icon me-4 text-primary">
                                        <span class="lnr lnr-earth fs-3"></span>
                                    </div>
                                    <div class="contact-content">
                                        <p class="mb-0">www.yourdomain.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center">
                <!-- Copyright Text -->
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0">&copy; 2025 SPMB Online. All rights reserved.</p>
                </div>

                <!-- Social Links -->
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end align-items-center">
                        <span class="me-3">Follow Us</span>
                        <div class="social-links">
                            <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/icon-font.min.js"></script>

    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    const navbarHeight = document.querySelector('.navbar').offsetHeight;
                    const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset -
                        navbarHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });

                    // Update URL without refreshing
                    if (history.pushState) {
                        history.pushState(null, null, targetId);
                    } else {
                        location.hash = targetId;
                    }
                }
            });
        });

        // Update active nav link on scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');

            let currentSection = '';

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                const navbarHeight = document.querySelector('.navbar').offsetHeight;

                if (pageYOffset >= (sectionTop - navbarHeight - 50)) {
                    currentSection = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${currentSection}`) {
                    link.classList.add('active');
                }
            });
        });

        // Initialize carousel with pause on hover
        document.addEventListener('DOMContentLoaded', function() {
            var myCarousel = document.getElementById('testimonialCarousel');
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 5000,
                pause: 'hover'
            });
        });
    </script>
</body>

</html>