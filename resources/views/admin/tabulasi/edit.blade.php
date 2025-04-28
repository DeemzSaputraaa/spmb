@extends('layouts.admin')

@section('title', 'Edit Nilai Siswa')

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
        color: #f6c23e;
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
        border-color: #f6c23e;
        box-shadow: 0 0 0 0.25rem rgba(246, 194, 62, 0.25);
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
    
    .btn-warning {
        background-color: #f6c23e;
        border-color: #f6c23e;
        color: #fff !important;
        text-decoration: none;
    }
    
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
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
        <h1 class="page-title">Edit Nilai Siswa</h1>
        <a href="{{ route('admin.tabulasi.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left fa-sm"></i> Kembali
        </a>
    </div>
    
    <!-- Form Container -->
    <div class="form-container">
        <h6 class="form-title">Form Edit Nilai</h6>
        
        <form action="{{ route('admin.tabulasi.update', $tabulasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="nama_siswa" class="form-label">Siswa</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" id="nama_siswa" value="{{ $tabulasi->nama_siswa }} ({{ $tabulasi->nisn }})" readonly>
                    </div>
                    <small class="text-muted">Tidak dapat diubah</small>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="jalur" class="form-label required">Jalur Pendaftaran</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                        <select class="form-select @error('jalur') is-invalid @enderror" id="jalur" name="jalur" required>
                            <option value="Afirmasi" {{ $tabulasi->jalur == 'Afirmasi' ? 'selected' : '' }}>Afirmasi</option>
                            <option value="Prestasi" {{ $tabulasi->jalur == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                            <option value="Domisili" {{ $tabulasi->jalur == 'Domisili' ? 'selected' : '' }}>Domisili</option>
                            <option value="Mutasi" {{ $tabulasi->jalur == 'Mutasi' ? 'selected' : '' }}>Mutasi</option>
                        </select>
                        @error('jalur')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="jurusan" class="form-label required">Jurusan</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-graduation-cap"></i></span>
                        <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" value="{{ old('jurusan', $tabulasi->jurusan) }}" placeholder="Masukkan Jurusan" required>
                        @error('jurusan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label for="nilai_akhir" class="form-label required">Nilai Akhir</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-star"></i></span>
                        <input type="number" step="0.01" min="0" max="100" class="form-control @error('nilai_akhir') is-invalid @enderror" id="nilai_akhir" name="nilai_akhir" value="{{ old('nilai_akhir', $tabulasi->nilai_akhir) }}" placeholder="Masukkan Nilai Akhir" required>
                        @error('nilai_akhir')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="text-muted">Nilai akhir dalam rentang 0-100.</small>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-outline-secondary btn-form me-2 mb-2 mb-md-0">
                    <i class="fas fa-undo"></i> Reset
                </button>
                <button type="submit" class="btn btn-warning btn-form">
                    <i class="fas fa-save"></i> Update Nilai
                </button>
            </div>
        </form>
    </div>
</div>
@endsection