@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    .profile-card {
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
    }
    
    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .profile-header {
        background: linear-gradient(135deg, #4e73df 0%, #36b9cc 100%);
        color: white;
        padding: 15px;
        border-radius: 15px 15px 0 0;
    }
    
    .profile-photo {
        border: 5px solid white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
        margin-top: 10px;
    }
    
    .profile-photo:hover {
        transform: scale(1.03);
    }
    
    .data-label {
        color: #5a5c69;
        font-weight: 600;
    }
    
    .data-value {
        color: #333;
        font-weight: 500;
        padding-left: 10px;
        border-left: 3px solid #4e73df;
        margin-left: 5px;
    }
    
    .data-row {
        padding: 8px 0;
        border-bottom: 1px solid #f1f1f1;
        transition: background-color 0.2s;
    }
    
    .data-row:hover {
        background-color: #f8f9fc;
    }
    
    .data-section {
        background-color: white;
        border-radius: 0 0 15px 15px;
    }
    
    .footer-custom {
        background-color: #f8f9fc;
        border-radius: 10px;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
    }
</style>

<!-- Main Content -->
<div class="container my-5">
    <div class="card profile-card">
        <div class="card-header profile-header">
            <h5 class="mb-0 font-weight-bold">Data Pribadi Siswa</h5>
        </div>
        <div class="card-body p-0">
            <div class="row g-0">
                <!-- Photo Column -->
                <div class="col-md-3 border-end p-4 text-center bg-light">
                    <div class="d-flex justify-content-center">
                        @if($pendaftaran && $pendaftaran->foto)
                            <img src="{{ asset('storage/'.$pendaftaran->foto) }}" alt="Foto Siswa" 
                                class="img-thumbnail profile-photo rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-profile.jpg') }}" alt="Foto Siswa" 
                                class="img-thumbnail profile-photo rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        @endif
                    </div>
                    <h5 class="mt-3 font-weight-bold">{{ $siswa->nama_lengkap ?? 'Siswa' }}</h5>
                    <p class="text-muted">NISN: {{ $siswa->nisn ?? '-' }}</p>
                </div>

                <!-- Data Column -->
                <div class="col-md-9 p-0 data-section">
                    <div class="p-4">
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">NISN</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ $siswa->nisn ?? '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">NIK</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ $siswa->nik ?? '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Nama Siswa</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ $siswa->nama_lengkap ?? '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Tempat Lahir</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->tempat_lahir) ? $pendaftaran->tempat_lahir : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Tanggal Lahir</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->tanggal_lahir) ? $pendaftaran->tanggal_lahir->format('d-m-Y') : '00-00-0000' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">No.Reg. Akta Lahir</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->no_akta_lahir) ? $pendaftaran->no_akta_lahir : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Agama</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->agama) ? $pendaftaran->agama : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Alamat jalan</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->alamat_jalan) ? $pendaftaran->alamat_jalan : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Kelurahan</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->kelurahan) ? $pendaftaran->kelurahan : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Kecamatan</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->kecamatan) ? $pendaftaran->kecamatan : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Kabupaten</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->kabupaten) ? $pendaftaran->kabupaten : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Propinsi</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->provinsi) ? $pendaftaran->provinsi : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Jalur</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->jalur_pendaftaran) ? $pendaftaran->jalur_pendaftaran : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Jurusan</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->jurusan) ? $pendaftaran->jurusan : '-' }}</div>
                        </div>
                        <div class="row data-row mb-2">
                            <div class="col-sm-4 col-md-3 data-label">Asal Sekolah</div>
                            <div class="col-sm-8 col-md-9 data-value">{{ ($pendaftaran && $pendaftaran->asal_sekolah) ? $pendaftaran->asal_sekolah : '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="mt-4 py-3 text-center text-muted small footer-custom">
    <p class="mb-0">© 2025 Sistem Penerimaan Mahasiswa Baru</p>
</footer>
@endsection