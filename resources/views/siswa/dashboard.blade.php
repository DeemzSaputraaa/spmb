@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Main Content -->
<div class="container my-3 my-md-4">
    <div class="card shadow-sm">
        <div class="card-header bg-light py-2 py-md-3">
            <h5 class="mb-0">Foto Pribadi</h5>
        </div>
        <div class="card-body p-0">
            <div class="row g-0">
                <!-- Photo Column -->
                <div class="col-md-3 border-end p-2 p-md-3 text-center d-flex flex-column align-items-center">
                    <div class="student-photo-container mb-2 mb-md-0">
                        <img src="{{ asset('images/pasFOTO.jpg') }}" alt="Foto Siswa"
                            class="img-thumbnail student-photo">
                    </div>
                    <!-- <button class="btn btn-sm btn-primary mt-2 d-md-none w-75">Lihat Foto</button> -->
                </div>

                <!-- Data Column -->
                <div class="col-md-9 p-2 p-md-3">
                    <div class="row g-2 g-md-3">
                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">NISN</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">121231231231</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">NIK</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">123123123123123</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Nama Siswa</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">Julian Dewi</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Tempat Lahir</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">blablabla</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Tanggal Lahir</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">12123123123</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">No.Reg. Akta Lahir</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">2231231021</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Agama</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">Taelelooo</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Alamat jalan</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">asdfsdf, ataf</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Kelurahan</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">sadfasdasd</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Kecamatan</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">Jawa Tengah</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Kabupaten</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">Jawa Tengah</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Propinsi</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">Jawa</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Jalur</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">Afirmasi</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Jurusan</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">Jogja-Solo</div>

                        <div class="col-6 col-sm-4 col-md-3 fw-semibold text-muted">Asal Sekolah</div>
                        <div class="col-6 col-sm-8 col-md-9 text-truncate">Jawa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="mt-3 mt-md-4 py-2 py-md-3 text-center text-muted small">
    <p class="mb-0">© 2025 Sistem Penerimaan Mahasiswa Baru</p>
</footer>

<style>
    /* Custom styles for responsive layout */
    .student-photo-container {
        width: 100%;
        max-width: 250px;
        height: auto;
        aspect-ratio: 5/6;
        /* Maintain photo ratio */
    }

    .student-photo {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    /* Responsive adjustments */
    @media (max-width: 767.98px) {
        .border-end {
            border-right: none !important;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 1rem !important;
        }

        .card-header h5 {
            font-size: 1.1rem;
        }

        .fw-semibold {
            font-size: 0.9rem;
        }

        .col-6 {
            padding: 0.25rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .student-photo-container {
            max-width: 200px;
        }
    }

    @media (min-width: 992px) {
        .student-photo-container {
            max-width: 250px;
        }
    }
</style>

<script>
    // Optional: Toggle photo view on mobile
    document.addEventListener('DOMContentLoaded', function() {
        const photoBtn = document.querySelector('.btn.btn-primary.d-md-none');
        if (photoBtn) {
            photoBtn.addEventListener('click', function() {
                const photoContainer = document.querySelector('.student-photo-container');
                photoContainer.classList.toggle('expanded');
                this.textContent = photoContainer.classList.contains('expanded') ? 'Sembunyikan' :
                    'Lihat Foto';
            });
        }
    });
</script>
@endsection