@extends('layouts.admin')

@section('title', 'Edit Nilai Siswa')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Nilai Siswa</h1>
    <a href="{{ route('admin.tabulasi.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Nilai</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tabulasi.update', $tabulasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Siswa</label>
                    <input type="text" class="form-control" value="{{ $tabulasi->nama_siswa }} ({{ $tabulasi->nisn }})"
                        readonly>
                    <small class="text-muted">Tidak dapat diubah</small>
                </div>

                <div class="col-md-6 mb-3">
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

                <div class="col-md-6 mb-3">
                    <label class="form-label required">Jurusan</label>
                    <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan"
                        value="{{ old('jurusan', $tabulasi->jurusan) }}" required>
                    @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
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
                <button type="reset" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-undo"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Nilai
                </button>
            </div>
        </form>
    </div>
</div>
@endsection