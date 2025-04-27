@extends('layouts.admin')

@section('title', 'Tambah Siswa')

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
    
    .form-container {
        background-color: #fff;
        border: 1px solid #e3e6f0;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .form-container .form-title {
        font-weight: 600;
        color: #4e73df;
        padding-bottom: 10px;
        border-bottom: 1px solid #e3e6f0;
        margin-bottom: 20px;
    }
    
    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
    }
    
    .required::after {
        content: ' *';
        color: #e74a3b;
    }
    
    .form-control, .form-select {
        border: 1px solid #d1d3e2;
        border-radius: 5px;
        padding: 10px;
        font-size: 0.9rem;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    .input-group-text {
        background-color: #f8f9fc;
        border: 1px solid #d1d3e2;
        border-right: none;
    }
    
    .btn-form {
        font-weight: 500;
        padding: 8px 16px;
        border-radius: 5px;
        transition: all 0.3s;
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
    
    .btn-secondary {
        background-color: #858796;
        border-color: #858796;
        color: white !important;
        text-decoration: none;
    }
    
    .btn-secondary:hover {
        background-color: #717484;
        border-color: #717484;
        color: white !important;
    }
    
    .btn-outline-secondary {
        border-color: #d1d3e2;
        color: #6c757d !important;
        text-decoration: none;
    }
    
    .btn-outline-secondary:hover {
        background-color: #f8f9fc;
        color: #6c757d !important;
    }
    
    .btn-form:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    @media (max-width: 767px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .form-container {
            padding: 15px;
        }
        
        .btn-form {
            width: 100%;
            margin-bottom: 10px;
        }
        
        .input-group {
            flex-wrap: nowrap;
        }
    }
</style>
@endsection

@section('content')
<div class="page-wrapper">
    <!-- Page Header -->
    <div class="page-header">
        <h1 class="page-title">Tambah Siswa Baru</h1>
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>
    
    <!-- Form Container -->
    <div class="form-container">
        <h6 class="form-title">Form Data Siswa</h6>
        
        <form action="{{ route('admin.siswa.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="nisn" class="form-label required">NISN</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn') }}" placeholder="Masukkan NISN" required>
                    @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="text-muted">NISN (Nomor Induk Siswa Nasional), hanya angka.</small>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="nik" class="form-label required">NIK</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik" value="{{ old('nik') }}" placeholder="Masukkan NIK" required>
                        @error('nik')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="text-muted">NIK (16 digit), hanya angka.</small>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="nama_lengkap" class="form-label required">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="Masukkan Nama Lengkap" required>
                        @error('nama_lengkap')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="email" class="form-label required">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="nomor_hp" class="form-label required">Nomor HP</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Masukkan Nomor HP" required>
                        @error('nomor_hp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="text-muted">Nomor HP, hanya angka.</small>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="password" class="form-label required">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password" required>
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="text-muted">Minimal 6 karakter. Password ini akan digunakan siswa untuk login ke sistem.</small>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-outline-secondary btn-form me-2 mb-2 mb-md-0">
                    <i class="fas fa-undo"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary btn-form">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 