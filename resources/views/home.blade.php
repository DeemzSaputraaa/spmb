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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

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
        }

        /* Navbar */
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Navbar Styles */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .nav-link {
            font-weight: 500;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: #0d6efd;
            bottom: 0;
            left: 0;
        }

        /* Hero Section Styles */
        .hero-section {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 80px;
            /* Account for fixed navbar */
            position: relative;
        }

        .hero-image {
            max-height: 450px;
            object-fit: contain;
        }

        /* Responsive text sizes */
        .display-4 {
            font-size: 2.8rem;
            line-height: 1.2;
        }

        .lead {
            font-size: 1.15rem;
        }

        /* Small devices (landscape phones) */
        @media (max-width: 767.98px) {
            .display-4 {
                font-size: 2.2rem;
            }

            .lead {
                font-size: 1rem;
            }

            .hero-image {
                max-height: 300px;
                margin-top: 1rem;
            }

            .hero-section {
                min-height: auto;
                padding-top: 70px;
                padding-bottom: 2rem;
            }

            .min-vh-100 {
                min-height: auto !important;
                padding: 2rem 0;
            }
        }

        /* Medium devices (tablets) */
        @media (min-width: 768px) and (max-width: 991.98px) {
            .display-4 {
                font-size: 2.5rem;
            }

            .min-vh-100 {
                min-height: 85vh !important;
            }
        }

        /* Buttons */
        .btn {
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-outline-light {
            border: 2px solid white;
        }

        .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: white;
        }

        .btn-light {
            border: 2px solid white;
        }

        /* Container adjustments */
        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        @media (min-width: 1400px) {
            .container {
                max-width: 1240px;
            }
        }

        @media (min-width: 1400px) {
            .container {
                padding-left: 3rem;
                padding-right: 3rem;
            }

            .nav-item {
                margin-left: 1rem !important;
                margin-right: 1rem !important;
            }
        }

        /* .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 5rem 0;
        } */

        .hero-section {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 80px 0;
            position: relative;
        }


        .hero-text {
            position: relative;
            z-index: 2;
        }

        .min-vh-80 {
            min-height: 80vh;
        }

        @media (max-width: 992px) {
            .hero-section {
                text-align: center;
                padding: 4rem 0;
                font-size: 2.8rem !important;
            }

            .hero-text {
                margin-bottom: 3rem;
            }

            .d-flex {
                justify-content: center;
            }

            .hero-section h1 {
                font-size: 3rem !important;
            }

            .hero-section p {
                font-size: 1.25rem !important;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 3rem 0;
            }

            .hero-section h1 {
                font-size: 2.3rem !important;
            }

            .hero-section p {
                font-size: 1.1rem !important;
            }
        }

        @media (min-width: 992px) {
            .hero-section img {
                max-height: 400px;
                object-fit: contain;
            }
        }

        /* Container width adjustment */
        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }

        @media (min-width: 1400px) {
            .container {
                max-width: 1240px;
            }
        }

        .hero-section .btn {
            border-radius: 4px;
            padding: 10px 24px;
            transition: all 0.3s ease;
        }

        .hero-section .btn-outline-light {
            border: 1px solid white;
        }

        .hero-section .btn-outline-light:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .hero-section .btn-light {
            background-color: white;
            color: #5E87F5;
        }

        .hero-section .btn-light:hover {
            background-color: #f8f9fa;
        }


        /* Button Hero */

        .button-container {
            display: flex;
            gap: 20px;
        }

        .button {
            display: inline-block;
            padding: 12px 30px;
            font-weight: bold;
            text-decoration: none;
            text-transform: uppercase;
            border-radius: 4px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .button-primary {
            background-color: #6495ED;
            color: white;
            border: 2px solid white;
        }

        .button-secondary {
            background-color: white;
            color: #6495ED;
            border: 2px solid white;
        }

        .button:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

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
        }

        .hover-card:hover {
            border-color: transparent;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .hover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('images/slider-bg.png');
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            border-radius: 0.25rem;
        }

        .hover-card:hover .hover-overlay {
            opacity: 1;
        }

        .hover-card:hover h3,
        .hover-card:hover p,
        .hover-card:hover span {
            color: white !important;
            position: relative;
            z-index: 2;
        }

        .text-primary {
            color: #0d6efd !important;
        }

        .hover-card:hover .text-primary {
            color: white !important;
        }

        /* Testimoni */
        .testimonial-section {
            background: linear-gradient(rgba(240, 245, 255, 0.9), rgba(240, 245, 255, 0.9)), url('images/test-bg.png') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            padding: 80px 0;
        }

        .testimonial-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            height: 100%;
        }

        .testimonial-card:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .avatar-circle {
            width: 80px;
            height: 80px;
            background-color: #ddd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #777;
            margin-bottom: 20px;
        }

        .school-name {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .stars {
            color: #FFC107;
            margin-bottom: 15px;
        }

        .testimonial-text {
            font-style: italic;
            color: #666;
            text-align: center;
        }

        .carousel-indicators {
            bottom: -50px;
        }

        .carousel-indicators button {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: #ccc;
            margin: 0 5px;
        }

        .carousel-indicators .active {
            background-color: #6c757d;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
        }

        .carousel-control-prev {
            left: -20px;
        }

        .carousel-control-next {
            right: -20px;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 20px;
            height: 20px;
            filter: invert(1) grayscale(100);
        }

        .section-title {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .section-subtitle {
            font-size: 18px;
            color: #777;
            margin-bottom: 40px;
        }

        @media (max-width: 991px) {
            .testimonial-card {
                margin-bottom: 20px;
            }
        }

        footer {
            background-color: #212529;
        }

        @media (max-width: 768px) {
            /* .hero-section {
                padding: 3rem 0;
                text-align: center;
            } */

            .hero-image {
                margin-top: 2rem;
            }
        }

        .hover-card {
            transition: all 0.3s ease;
            z-index: 1;
        }

        .hover-card:hover {
            background-color: #0d6efd;
            color: white !important;
            transform: translateY(-5px);
        }

        .hover-card:hover h3,
        .hover-card:hover p {
            color: white !important;
        }

        .hover-card:hover .lnr {
            color: white !important;
        }

        /* .hover-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(13, 110, 253, 0);
        transition: background-color 0.3s ease;
        z-index: -1;
    }

    .hover-card:hover .hover-overlay {
        background-color: rgba(13, 110, 253, 0.1);
    } */

        .action-area {
            padding: 60px 0;
            color: white;
        }

        .btn-light {
            background-color: white;
            color: #333;
            transition: all 0.3s ease;
            border: none;
            border-radius: 4px;
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            background-size: 60%;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Add smooth transition for hover effects */
        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        /* Ensure proper spacing between stars */
        .text-warning i {
            margin: 0 2px;
        }

        .contact-item {
            align-items: flex-start;
        }

        .contact-icon {
            line-height: 1;
            margin-top: 3px;
        }

        .contact-content p {
            margin-bottom: 0.25rem;
        }

        .contact-list {
            backdrop-filter: blur(5px);
        }

        .social-links a {
            display: inline-block;
            width: 32px;
            height: 32px;
            line-height: 32px;
            text-align: center;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: #0d6efd;
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-white fixed-top py-2 py-lg-3 shadow">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 me-lg-5" href="{{ url('/') }}">
                <img src="/images/logo.png" alt="SPMB Logo" height="45" class="d-inline-block">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item mx-1 mx-xl-2">
                        <a class="nav-link text-dark active" href="#home">Home</a>
                    </li>
                    <li class="nav-item mx-1 mx-xl-2">
                        <a class="nav-link text-dark" href="#harga">Harga</a>
                    </li>
                    <li class="nav-item mx-1 mx-xl-2">
                        <a class="nav-link text-dark" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item mx-1 mx-xl-2">
                        <a class="nav-link text-dark" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item mx-1 mx-xl-2">
                        <a class="nav-link text-dark" href="#hubungi">Hubungi</a>
                    </li>
                    <li class="nav-item ms-2 mt-3 mt-lg-0">
                        <a class="btn btn-primary text-white fw-bold px-4 py-2" href="">SIGN UP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="slider" class="hero-section" style="background-image: url('{{ asset('images/slider-bg.png') }}');">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <!-- Text content - Left side -->
                <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start">
                    <div class="hero-text">
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
                        class="img-fluid rounded-3 shadow-lg hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
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
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body text-center p-4 d-flex flex-column position-relative hover-card">
                            <div class="mb-3">
                                <span class="lnr lnr-select fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Langsung Pakai</h3>
                            <p class="text-muted mb-0 flex-grow-1">Sekolah tidak perlu menyiapkan dan mensetting
                                teknologi tinggi, setelah berlangganan bisa langsung digunakan.</p>
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>

                <!-- Box 2 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body text-center p-4 d-flex flex-column position-relative hover-card">
                            <div class="mb-3">
                                <span class="lnr lnr-rocket fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Kecepatan Tinggi</h3>
                            <p class="text-muted mb-0 flex-grow-1">Website dapat melayani pengguna secara cepat, baik
                                calon siswa maupun sekolah penerima.</p>
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>

                <!-- Box 3 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body text-center p-4 d-flex flex-column position-relative hover-card">
                            <div class="mb-3">
                                <span class="lnr lnr-phone fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">24/7 Support</h3>
                            <p class="text-muted mb-0 flex-grow-1">Layanan pendukung bila ada gangguan selama 24 jam
                                seminggu melalui chatting dan telpon.</p>
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>

                <!-- Box 4 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body text-center p-4 d-flex flex-column position-relative hover-card">
                            <div class="mb-3">
                                <span class="lnr lnr-tag fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Harga Terjangkau</h3>
                            <p class="text-muted mb-0 flex-grow-1">Dengan harga terjangkau kami memberikan layanan
                                berkualitas prima.</p>
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>

                <!-- Box 5 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body text-center p-4 d-flex flex-column position-relative hover-card">
                            <div class="mb-3">
                                <span class="lnr lnr-laptop-phone fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Mudah Diakses</h3>
                            <p class="text-muted mb-0 flex-grow-1">Mudah diakses oleh semua perangkat baik komputer
                                maupun smartphone hanya melalui website tanpa melakukan install aplikasi.</p>
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>

                <!-- Box 6 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body text-center p-4 d-flex flex-column position-relative hover-card">
                            <div class="mb-3">
                                <span class="lnr lnr-book fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Sesuai Regulasi Resmi</h3>
                            <p class="text-muted mb-0 flex-grow-1">Sistem sudah sesuai dengan peraturan pemerintah
                                tentang SPMB 2025.</p>
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>

                <!-- Box 7 -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card h-100 overflow-hidden">
                        <div class="card-body text-center p-4 d-flex flex-column position-relative hover-card">
                            <div class="mb-3">
                                <span class="lnr lnr-file-empty fs-1 text-primary"></span>
                                <span class="lnr lnr-checkmark-circle fs-1 text-primary"></span>
                            </div>
                            <h3 class="h5 fw-bold mb-3">Sistem Pelaporan Otomatis</h3>
                            <p class="text-muted mb-0 flex-grow-1">Setiap data yang dinput akan diproses untuk
                                menghasilkan sistem tabulasi otomatis.</p>
                            <div class="hover-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

    <section id="action" class="action-area py-5"
        style="background: url('images/slider-bg.png') no-repeat center center; background-size: cover;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-8 col-sm-12 mb-3 mb-md-0">
                    <h3 class="text-white mb-0">Daftarkan Segera Bersama Kami untuk Kemudahan Layanan<br>Pendaftaran di
                        Sekolah Anda</h>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12 text-md-end text-center">
                    <a href="#" class="btn btn-light btn-lg px-4 py-2 fw-bold">GET IT NOW</a>
                </div>
            </div>
        </div>
    </section>

    <section id="service" class="service-area py-5 bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h2 class="fw-bold">Kemudahan yang Diperoleh</h2>
                    <div class="mx-auto"
                        style="width: 100px; height: 3px; background-color: #0d6efd; margin: 20px auto;"></div>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <ul class="list-unstyled" style="font-size: 1.1rem;">
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
                <div class="col-lg-5 col-md-6">
                    <img src="{{ asset('images/bawah.jpg') }}" alt="Kemudahan SPMB Online"
                        class="img-fluid rounded shadow" onerror="this.style.display='none'">
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section -->
    <!-- <section id="testimonials" class="py-5"
        style="background: url('images/test-bg.png') no-repeat center center; background-size: cover; background-attachment: fixed;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-white">Testimoni</h2>
                <p class="text-white">Pengalaman Pengguna</p>
            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card border-0 bg-white text-dark p-4 mx-auto"
                                    style="max-width: 500px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                    <div class="card-body text-center">
                                        <h4 class="mb-3">SMAN 1 Jakarta</h4>
                                        <div class="text-warning mb-3">
                                            <i class="bi bi-star-fill fs-5"></i>
                                            <i class="bi bi-star-fill fs-5"></i>
                                            <i class="bi bi-star-fill fs-5"></i>
                                            <i class="bi bi-star-fill fs-5"></i>
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <p class="mb-0 fst-italic">"Mudah digunakan dan sangat membantu"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card border-0 bg-white text-dark p-4 mx-auto"
                                    style="max-width: 500px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                                    <div class="card-body text-center">
                                        <h4 class="mb-3">SMPN 2 Jakarta Timur</h4>
                                        <div class="text-warning mb-3">
                                            <i class="bi bi-star-fill fs-5"></i>
                                            <i class="bi bi-star-fill fs-5"></i>
                                            <i class="bi bi-star-fill fs-5"></i>
                                            <i class="bi bi-star-fill fs-5"></i>
                                            <i class="bi bi-star-fill fs-5"></i>
                                        </div>
                                        <p class="mb-0 fst-italic">"Calon Siswa sangat terbantu"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section> -->

    <section class="testimonial-section"
        style="background: url('images/test-bg.png') no-repeat center center; background-size: cover; background-attachment: fixed;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Testimoni</h2>
                <p class="section-subtitle">Pengalaman Pengguna</p>
            </div>

            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="false" data-bs-interval="false">
                <div class="carousel-inner">
                    <!-- Page 1 - Both testimonials showing -->
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <!-- Testimonial 1 -->
                            <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                                <div class="testimonial-card">
                                    <div class="avatar-circle">80x80</div>
                                    <h4 class="school-name">SMAN 1 Jakarta</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonial-text">"Mudah digunakan dan sangat membantu"</p>
                                </div>
                            </div>

                            <!-- Testimonial 2 -->
                            <div class="col-lg-5 col-md-6">
                                <div class="testimonial-card">
                                    <div class="avatar-circle">80x80</div>
                                    <h4 class="school-name">SMPN 2 Jakarta Timur</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonial-text">"Calon Siswa sangat terbantu"</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Page 2 - Another set of testimonials if needed -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <!-- Testimonial 3 -->
                            <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                                <div class="testimonial-card">
                                    <div class="avatar-circle">80x80</div>
                                    <h4 class="school-name">SMA 3 Bandung</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonial-text">"Sangat praktis untuk pendaftaran online"</p>
                                </div>
                            </div>

                            <!-- Testimonial 4 -->
                            <div class="col-lg-5 col-md-6">
                                <div class="testimonial-card">
                                    <div class="avatar-circle">80x80</div>
                                    <h4 class="school-name">SMKN 1 Surabaya</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="testimonial-text">"Proses pendaftaran menjadi lebih efisien"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

                <!-- Carousel Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5"
        style="background: url('images/test-bg.png') no-repeat center center; background-size: cover; background-attachment: fixed;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Hubungi Kami</h2>
                <div class="mx-auto" style="width: 80px; height: 3px; background-color: #0d6efd; margin: 15px auto;">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="contact-list bg-white p-4 p-lg-5 rounded shadow-sm">
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

    <!-- Linearicons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container">
            <div class="row align-items-center">
                <!-- Copyright Text -->
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0">&copy; 2025 Copyright</p>
                </div>

                <!-- Social Links -->
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end align-items-center">
                        <span class="me-3">Follow Us</span>
                        <div class="social-links">
                            <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-google-plus-g"></i></a>
                            <a href="#" class="text-white me-2"><i class="fab fa-youtube"></i></a>
                            <a href="#" class="text-white"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        // Simple JavaScript for active nav link
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });

        // Disable auto-sliding
        document.addEventListener('DOMContentLoaded', function() {
            var myCarousel = document.getElementById('testimonialCarousel');
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: false,
                wrap: true
            });
        });
    </script>
</body>

</html>