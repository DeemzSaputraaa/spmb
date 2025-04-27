@extends('layouts.admin')

@section('title', 'Edit Nilai Siswa')

@section('styles')
<style>
    .form-label {
        font-weight: 600;
        color: #4e73df;
    }
    
    .required::after {
        content: ' *';
        color: #e74a3b;
    }
    
    .card-form {
        border-top: 4px solid #f6c23e;
    }
    
    /* Responsive styling */
    @media (max-width: 767px) {
        .d-sm-flex {
            flex-direction: column;
            gap: 10px;
        }
        
        .d-sm-flex .btn {
            align-self: flex-start;
            margin-top: 10px;
            width: 100%;
        }
        
        .form-select {
            width: 100%;
        }
        
        h1.h3 {
            font-size: 1.5rem;
        }
        
        .card-header h6 {
            font-size: 0.9rem;
        }
    }
    
    @media (max-width: 576px) {
        .card-body {
            padding: 1rem;
        }
        
        .btn {
            width: 100%;
            margin-bottom: 0.5rem;
            padding: 0.375rem 0.5rem;
            font-size: 0.9rem;
        }
        
        .d-flex.justify-content-end {
            flex-direction: column;
        }
        
        .d-flex.justify-content-end .btn {
            margin-right: 0 !important;
        }
        
        .form-label, .form-control, .form-select, .text-muted {
            font-size: 0.9rem;
        }
        
        .card {
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .card-header {
            padding: 0.75rem 1rem;
        }
        
        .container, .container-fluid {
            padding-left: 10px;
            padding-right: 10px;
        }
        
        .row {
            margin-left: -5px;
            margin-right: -5px;
        }
        
        .col, .col-sm-12, .col-md-6 {
            padding-left: 5px;
            padding-right: 5px;
        }
        
        .btn-warning {
            color: #212529;
        }
    }
</style>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Nilai Siswa</h1>
    <a href="{{ route('admin.tabulasi.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4 card-form">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-warning">Form Edit Nilai</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tabulasi.update', $tabulasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-3">
                    <label class="form-label">Siswa</label>
                    <input type="text" class="form-control" value="{{ $tabulasi->nama_siswa }} ({{ $tabulasi->nisn }})"
                        readonly>
                    <small class="text-muted">Tidak dapat diubah</small>
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label class="form-label required">Jalur Pendaftaran</label>
                    <select class="form-select @error('jalur') is-invalid @enderror" name="jalur" required>
                        <option value="Afirmasi" {{ $tabulasi->jalur == 'Afirmasi' ? 'selected' : '' }}>Afirmasi
                        </option>
                        <option value="Prestasi" {{ $tabulasi->jalur == 'Prestasi' ? 'selected' : '' }}>Prestasi
                        </option>
                        <option value="Domisili" {{ $tabulasi->jalur == 'Domisili' ? 'selected' : '' }}>Domisili
                        </option>
                        <option value="Mutasi" {{ $tabulasi->jalur == 'Mutasi' ? 'selected' : '' }}>Mutasi</option>
                    </select>
                    @error('jalur')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label class="form-label required">Jurusan</label>
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"
                        value="{{ old('jurusan', $tabulasi->jurusan) }}" required>
                    @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 col-sm-12 mb-3">
                    <label class="form-label required">Nilai Akhir</label>
                    <input type="number" step="0.01" min="0" max="100"
                        class="form-control @error('nilai_akhir') is-invalid @enderror" name="nilai_akhir"
                        value="{{ old('nilai_akhir', $tabulasi->nilai_akhir) }}" required>
                    @error('nilai_akhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-outline-secondary me-2 mb-2 mb-md-0">
                    <i class="fas fa-undo"></i> Reset
                </button>
                <button type="submit" class="btn btn-warning">
                    <i class="fas fa-save"></i> Update Nilai
                </button>
            </div>
        </form>
    </div>
</div>
@endsection