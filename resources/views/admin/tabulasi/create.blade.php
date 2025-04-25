@extends('layouts.admin')

@section('title', 'Tambah Nilai Siswa')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Nilai Siswa</h1>
    <a href="{{ route('admin.tabulasi.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left fa-sm"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Nilai</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tabulasi.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Siswa</label>
                    <select class="form-select @error('siswa_id') is-invalid @enderror" name="siswa_id" required>
                        <option value="">Pilih Siswa</option>
                        @foreach($siswaList as $siswa)
                        <option value="{{ $siswa->id }}" {{ old('siswa_id') == $siswa->id ? 'selected' : '' }}>
                            {{ $siswa->nisn }} - {{ $siswa->nama_lengkap }}
                        </option>
                        @endforeach
                    </select>
                    @error('siswa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label required">Jalur Pendaftaran</label>
                    <select class="form-select @error('jalur') is-invalid @enderror" name="jalur" required>
                        <!-- <option value="">Pilih Jalur</option> -->
                        <option value="Afirmasi" {{ old('jalur') == 'Afirmasi' ? 'selected' : '' }}>Afirmasi</option>
                        <option value="Prestasi" {{ old('jalur') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="Domisili" {{ old('jalur') == 'Domisili' ? 'selected' : '' }}>Domisili</option>
                        <option value="Mutasi" {{ old('jalur') == 'Mutasi' ? 'selected' : '' }}>Mutasi</option>
                    </select>
                    @error('jalur')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label required">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" required>
                    @error('jurusan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label class="form-label required">Nilai Akhir</label>
                    <input type="number" step="0.01" min="0" max="100" class="form-control" name="nilai_akhir" required>
                    @error('nilai')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-undo"></i> Reset
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Nilai
                </button>
            </div>
        </form>
    </div>
</div>
@endsection