<form action="{{ route('admin.siswa.pendaftaran.step1', $siswa->id) }}" method="POST">
    @csrf
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nisn" class="form-label">NISN (Nomor Induk Siswa Nasional)</label>
                <input type="text" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror" 
                       value="{{ old('nisn', $pendaftaran->nisn ?? $siswa->nisn ?? '') }}" required>
                @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" 
                       value="{{ old('nik', $pendaftaran->nik ?? $siswa->nik ?? '') }}" required>
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                       value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir ?? '') }}" required>
                @error('tempat_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                       value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir ?? '') }}" required>
                @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small id="usia" class="form-text text-muted"></small>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="no_akta_lahir" class="form-label">No. Reg. Akta Lahir</label>
                <input type="text" name="no_akta_lahir" id="no_akta_lahir" class="form-control @error('no_akta_lahir') is-invalid @enderror" 
                       value="{{ old('no_akta_lahir', $pendaftaran->no_akta_lahir ?? '') }}" required>
                @error('no_akta_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="agama" class="form-label">Agama</label>
                <select name="agama" id="agama" class="form-select @error('agama') is-invalid @enderror" required>
                    <option value="" disabled {{ old('agama', $pendaftaran->agama ?? '') ? '' : 'selected' }}>-- Pilih Agama --</option>
                    <option value="Islam" {{ old('agama', $pendaftaran->agama ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ old('agama', $pendaftaran->agama ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ old('agama', $pendaftaran->agama ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ old('agama', $pendaftaran->agama ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ old('agama', $pendaftaran->agama ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                    <option value="Konghucu" {{ old('agama', $pendaftaran->agama ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
                @error('agama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="alamat_jalan" class="form-label">Alamat Jalan</label>
        <textarea name="alamat_jalan" id="alamat_jalan" class="form-control @error('alamat_jalan') is-invalid @enderror" 
                  rows="2" required>{{ old('alamat_jalan', $pendaftaran->alamat_jalan ?? '') }}</textarea>
        @error('alamat_jalan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="kelurahan" class="form-label">Kelurahan/Desa</label>
                <input type="text" name="kelurahan" id="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" 
                       value="{{ old('kelurahan', $pendaftaran->kelurahan ?? '') }}" required>
                @error('kelurahan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" 
                       value="{{ old('kecamatan', $pendaftaran->kecamatan ?? '') }}" required>
                @error('kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="kabupaten" class="form-label">Kabupaten/Kota</label>
                <input type="text" name="kabupaten" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror" 
                       value="{{ old('kabupaten', $pendaftaran->kabupaten ?? '') }}" required>
                @error('kabupaten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror" 
                       value="{{ old('provinsi', $pendaftaran->provinsi ?? '') }}" required>
                @error('provinsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <label for="jalur_pendaftaran" class="form-label">Pilih Jalur Pendaftaran</label>
        <select name="jalur_pendaftaran" id="jalur_pendaftaran" class="form-select @error('jalur_pendaftaran') is-invalid @enderror" required>
            <option value="" disabled {{ old('jalur_pendaftaran', $pendaftaran->jalur_pendaftaran ?? '') ? '' : 'selected' }}>-- Pilih Jalur Pendaftaran --</option>
            <option value="Jalur Afirmasi" {{ old('jalur_pendaftaran', $pendaftaran->jalur_pendaftaran ?? '') == 'Jalur Afirmasi' ? 'selected' : '' }}>Jalur Afirmasi</option>
            <option value="Jalur Domisili" {{ old('jalur_pendaftaran', $pendaftaran->jalur_pendaftaran ?? '') == 'Jalur Domisili' ? 'selected' : '' }}>Jalur Domisili</option>
            <option value="Jalur Prestasi" {{ old('jalur_pendaftaran', $pendaftaran->jalur_pendaftaran ?? '') == 'Jalur Prestasi' ? 'selected' : '' }}>Jalur Prestasi</option>
            <option value="Jalur Mutasi" {{ old('jalur_pendaftaran', $pendaftaran->jalur_pendaftaran ?? '') == 'Jalur Mutasi' ? 'selected' : '' }}>Jalur Mutasi</option>
        </select>
        @error('jalur_pendaftaran')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="wizard-nav">
        <a href="{{ route('admin.siswa.index') }}" class="btn btn-secondary">
            <i class="fas fa-times mr-1"></i> Batal
        </a>
        <button type="submit" class="btn btn-primary">
            Lanjutkan <i class="fas fa-arrow-right ml-1"></i>
        </button>
    </div>
</form>

@section('scripts')
@parent
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tanggalLahirInput = document.getElementById('tanggal_lahir');
        const usiaText = document.getElementById('usia');
        
        // Fungsi untuk menghitung usia
        function hitungUsia(tanggalLahir) {
            const today = new Date();
            const birthDate = new Date(tanggalLahir);
            let usia = today.getFullYear() - birthDate.getFullYear();
            const m = today.getMonth() - birthDate.getMonth();
            
            if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                usia--;
            }
            
            return usia;
        }
        
        // Fungsi untuk menampilkan usia
        function tampilkanUsia() {
            if (tanggalLahirInput.value) {
                const usia = hitungUsia(tanggalLahirInput.value);
                usiaText.textContent = `Usia: ${usia} tahun`;
            } else {
                usiaText.textContent = '';
            }
        }
        
        // Panggil fungsi saat halaman dimuat dan saat nilai input berubah
        tampilkanUsia();
        tanggalLahirInput.addEventListener('change', tampilkanUsia);
    });
</script>
@endsection 