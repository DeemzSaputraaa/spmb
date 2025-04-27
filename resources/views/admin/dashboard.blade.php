@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('styles')
<style>
    .page-wrapper {
        padding: 10px 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }
    
    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #e3e6f0;
        margin-bottom: 20px;
    }
    
    .page-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }
    
    .welcome-banner {
        background: linear-gradient(45deg, rgba(78, 115, 223, 0.1), rgba(26, 49, 119, 0.1));
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 25px;
        border-left: 4px solid #4e73df;
    }
    
    .welcome-title {
        font-weight: 600;
        margin-bottom: 5px;
        color: #4e73df;
    }
    
    .welcome-text {
        color: #6c757d;
        margin: 0;
    }
    
    .stat-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s;
        height: 100%;
        overflow: hidden;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
    }
    
    .stat-card .card-body {
        padding: 1.25rem;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        font-size: 20px;
        margin-right: 15px;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(45deg, #4e73df, #224abe);
    }
    
    .bg-gradient-success {
        background: linear-gradient(45deg, #1cc88a, #13855c);
    }
    
    .bg-gradient-warning {
        background: linear-gradient(45deg, #f6c23e, #dda20a);
    }
    
    .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 5px 0;
    }
    
    .stat-label {
        text-transform: uppercase;
        font-size: 0.7rem;
        font-weight: 600;
        color: #858796;
        letter-spacing: 0.05rem;
    }
    
    .stat-info {
        font-size: 0.8rem;
        color: #6c757d;
    }
    
    .table-section {
        margin-top: 30px;
    }
    
    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-bottom: 15px;
        border-bottom: 1px solid #e3e6f0;
        margin-bottom: 15px;
    }
    
    .table-title {
        font-weight: 600;
        color: #4e73df;
        margin: 0;
    }
    
    .table-container {
        border: 1px solid #e3e6f0;
        border-radius: 5px;
        overflow: auto;
    }
    
    .table-wrapper {
        min-width: 100%;
        overflow-x: auto;
    }
    
    .table-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        margin-right: 10px;
    }
    
    .btn-view-all {
        background-color: #4e73df;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 12px;
        font-size: 0.75rem;
        transition: all 0.3s;
    }
    
    .btn-view-all:hover {
        background-color: #2e59d9;
        transform: translateY(-2px);
    }
    
    @media (max-width: 767px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .stat-card {
            margin-bottom: 20px;
        }
        
        .stat-value {
            font-size: 1.5rem;
        }
        
        .table-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .btn-view-all {
            width: 100%;
        }
    }
    
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
        color: #fff !important;
        text-decoration: none;
    }
    
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2e59d9;
        color: #fff !important;
    }
</style>
@endsection

@section('content')
<div class="page-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Dashboard</h1>
    </div>
    
    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <h4 class="welcome-title">Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p class="welcome-text">Ringkasan data SPMB 2025 tersaji untuk Anda</p>
    </div>
    
    <!-- Stats Cards -->
    <div class="row">
        <!-- Total Siswa Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="stat-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-gradient-primary">
                            <i class="fas fa-users"></i>
                        </div>
                        <div>
                            <div class="stat-label">Total Siswa</div>
                            <div class="stat-value">{{ App\Models\Siswa::count() }}</div>
                            <div class="stat-info">
                                <i class="fas fa-info-circle me-1"></i> Total keseluruhan siswa
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.siswa.index') }}" class="btn btn-sm btn-primary d-block">
                            Kelola Data <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pendaftar Bulan Ini Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="stat-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-gradient-success">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <div>
                            <div class="stat-label">Pendaftar Bulan Ini</div>
                            <div class="stat-value">{{ App\Models\Siswa::whereMonth('created_at', date('m'))->count() }}</div>
                            <div class="stat-info">
                                <i class="fas fa-calendar-alt me-1"></i> Periode {{ date('F Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.siswa.index') }}?month={{ date('m') }}" class="btn btn-sm btn-success d-block">
                            Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pendaftar Hari Ini Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="stat-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-gradient-warning">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <div>
                            <div class="stat-label">Pendaftar Hari Ini</div>
                            <div class="stat-value">{{ App\Models\Siswa::whereDate('created_at', date('Y-m-d'))->count() }}</div>
                            <div class="stat-info">
                                <i class="fas fa-clock me-1"></i> {{ date('d F Y') }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.siswa.index') }}?day={{ date('Y-m-d') }}" class="btn btn-sm btn-warning d-block">
                            Lihat Detail <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Recent Students Table -->
    <div class="table-section">
        <div class="table-header">
            <h5 class="table-title">Data Siswa Terbaru</h5>
            <a href="{{ route('admin.siswa.index') }}" class="btn btn-view-all">
                <i class="fas fa-list fa-sm"></i> Lihat Semua
            </a>
        </div>
        
        <div class="table-container">
            <div class="table-wrapper">
                <table class="table table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>Siswa</th>
                            <th>NISN</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Pendaftaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse(App\Models\Siswa::latest()->take(5)->get() as $siswa)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($siswa->nama_lengkap) }}&background=4e73df&color=ffffff" class="table-avatar" alt="{{ $siswa->nama_lengkap }}">
                                    <div>
                                        <div class="fw-bold">{{ $siswa->nama_lengkap }}</div>
                                        <small class="text-muted">{{ Str::limit($siswa->nik, 8) }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->email }}</td>
                            <td>{{ $siswa->nomor_hp }}</td>
                            <td>{{ $siswa->created_at->format('d M Y H:i') }}</td>
                            <td>
                                <a href="{{ route('admin.siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center">
                                    <div class="avatar-circle">
                                        <i class="fas fa-user-slash"></i>
                                    </div>
                                    <h5>Data Siswa Kosong</h5>
                                    <p class="text-muted">Belum ada data siswa yang terdaftar</p>
                                    <a href="{{ route('admin.siswa.create') }}" class="btn btn-primary mt-2">
                                        <i class="fas fa-plus"></i> Tambah Siswa Baru
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 