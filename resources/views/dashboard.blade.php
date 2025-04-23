@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Main Content -->
<div class="container my-4">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">Foto Pribadi</h5>
        </div>
        <div class="card-body p-0">
            <div class="row g-0">
                <!-- Photo Column -->
                <div class="col-md-3 border-end p-3 text-center">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('images/pasFOTO.jpg') }}" alt="Foto Siswa" class="img-thumbnail"
                            style="width: 250px; height: 300px; object-fit: cover;">
                    </div>
                </div>

                <!-- Data Column -->
                <div class="col-md-9 p-3">
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">NISN</div>
                        <div class="col-sm-8 col-md-9">: 121231231231</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">NIK</div>
                        <div class="col-sm-8 col-md-9">: 123123123123123</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Nama Siswa</div>
                        <div class="col-sm-8 col-md-9">: Julian Dewi</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Tempat Lahir</div>
                        <div class="col-sm-8 col-md-9">: blablabla</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Tanggal Lahir</div>
                        <div class="col-sm-8 col-md-9">: 12123123123</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">No.Reg. Akta Lahir</div>
                        <div class="col-sm-8 col-md-9">: 2231231021</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Agama</div>
                        <div class="col-sm-8 col-md-9">: Taelelooo</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Alamat jalan</div>
                        <div class="col-sm-8 col-md-9">: asdfsdf, ataf</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Kelurahan</div>
                        <div class="col-sm-8 col-md-9">: sadfasdasd</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Kecamatan</div>
                        <div class="col-sm-8 col-md-9">: Jawa Tengah
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Kabupaten</div>
                        <div class="col-sm-8 col-md-9">: Jawa Tengah</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Propinsi</div>
                        <div class="col-sm-8 col-md-9">: Jawa</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Jalur</div>
                        <div class="col-sm-8 col-md-9">: Afirmasi</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Jurusan</div>
                        <div class="col-sm-8 col-md-9">: Jogja-Solo</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-md-3 fw-semibold text-muted">Asal Sekolah</div>
                        <div class="col-sm-8 col-md-9">: Jawa</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="mt-4 py-3 text-center text-muted small">
    <p class="mb-0">© 2025 Sistem Penerimaan Mahasiswa Baru</p>
</footer>
@endsection