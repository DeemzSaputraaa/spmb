<form action="{{ route('admin.siswa.pendaftaran.step1', $siswa->id) }}" method="POST">
    @csrf
    
    <div class="card mb-4">
        <div class="card-body bg-light">
            <div class="d-flex align-items-center">
                <i class="fas fa-info-circle text-primary me-2"></i>
                <p class="mb-0"><span class="text-danger">*</span> menandakan field yang wajib diisi</p>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="nisn" class="form-label">NISN (Nomor Induk Siswa Nasional) <span class="text-danger">*</span></label>
                <input type="text" name="nisn" id="nisn" class="form-control @error('nisn') is-invalid @enderror" 
                       value="{{ old('nisn', $pendaftaran->nisn ?? $siswa->nisn ?? '') }}" required>
                @error('nisn')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" 
                       value="{{ old('nik', $pendaftaran->nik ?? $siswa->nik ?? '') }}" required>
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" 
                       value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir ?? '') }}" required>
                @error('tempat_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-4 col-sm-8 mb-3">
            <div class="form-group">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                       value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir ?? '') }}" required>
                @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-2 col-sm-4 mb-3">
            <div class="form-group">
                <label for="usia_display" class="form-label">Usia <span class="text-danger">*</span></label>
                <input type="text" id="usia_display" class="form-control" readonly style="background-color: #f8f9fa;">
                <input type="hidden" name="usia" id="usia_input">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="no_akta_lahir" class="form-label">No. Reg. Akta Lahir <span class="text-danger">*</span></label>
                <input type="text" name="no_akta_lahir" id="no_akta_lahir" class="form-control @error('no_akta_lahir') is-invalid @enderror" 
                       value="{{ old('no_akta_lahir', $pendaftaran->no_akta_lahir ?? '') }}" required>
                @error('no_akta_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
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
    
    <div class="form-group mb-3">
        <label for="alamat_jalan" class="form-label">Alamat Jalan <span class="text-danger">*</span></label>
        <textarea name="alamat_jalan" id="alamat_jalan" class="form-control @error('alamat_jalan') is-invalid @enderror" 
                  rows="2" required>{{ old('alamat_jalan', $pendaftaran->alamat_jalan ?? '') }}</textarea>
        @error('alamat_jalan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="kelurahan" class="form-label">Kelurahan/Desa <span class="text-danger">*</span></label>
                <input type="text" name="kelurahan" id="kelurahan" class="form-control @error('kelurahan') is-invalid @enderror" 
                       value="{{ old('kelurahan', $pendaftaran->kelurahan ?? '') }}" required>
                @error('kelurahan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                <input type="text" name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" 
                       value="{{ old('kecamatan', $pendaftaran->kecamatan ?? '') }}" required>
                @error('kecamatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="kabupaten" class="form-label">Kabupaten/Kota <span class="text-danger">*</span></label>
                <input type="text" name="kabupaten" id="kabupaten" class="form-control @error('kabupaten') is-invalid @enderror" 
                       value="{{ old('kabupaten', $pendaftaran->kabupaten ?? '') }}" required>
                @error('kabupaten')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="provinsi" class="form-label">Provinsi <span class="text-danger">*</span></label>
                <input type="text" name="provinsi" id="provinsi" class="form-control @error('provinsi') is-invalid @enderror" 
                       value="{{ old('provinsi', $pendaftaran->provinsi ?? '') }}" required>
                @error('provinsi')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('provinsi') }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="sekolah_tujuan" class="form-label">Sekolah Tujuan <span class="text-danger">*</span></label>
                <input type="text" name="sekolah_tujuan" id="sekolah_tujuan" class="form-control @error('sekolah_tujuan') is-invalid @enderror" 
                       value="{{ old('sekolah_tujuan', $pendaftaran->sekolah_tujuan ?? '') }}" required>
                @error('sekolah_tujuan')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('sekolah_tujuan') }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" 
                       value="{{ old('jurusan', $pendaftaran->jurusan ?? '') }}" required>
                @error('jurusan')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('jurusan') }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="asal_sekolah" class="form-label">Asal Sekolah <span class="text-danger">*</span></label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror" 
                       value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah ?? '') }}" required>
                @error('asal_sekolah')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('asal_sekolah') }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="no_hp" class="form-label">No. Handphone <span class="text-danger">*</span></label>
                <input type="tel" name="no_hp" id="no_hp" class="form-control @error('no_hp') is-invalid @enderror" 
                       value="{{ old('no_hp', $pendaftaran->no_hp ?? '') }}" required pattern="[0-9]{10,13}">
                @error('no_hp')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('no_hp') }}
                    </div>
                @enderror
                <small class="text-muted">Format: 08xxxxxxxxxx (10-13 digit)</small>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email', $pendaftaran->email ?? '') }}" required>
                @error('email')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('email') }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12 mb-3">
            <div class="form-group">
                <label for="jalur_pendaftaran" class="form-label">Pilih Jalur Pendaftaran <span class="text-danger">*</span></label>
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
        </div>
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
        const usiaDisplay = document.getElementById('usia_display');
        const usiaInput = document.getElementById('usia_input');
        
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
                usiaDisplay.value = usia + ' tahun';
                usiaInput.value = usia;
            } else {
                usiaDisplay.value = '';
                usiaInput.value = '';
            }
        }
        
        // Panggil fungsi saat halaman dimuat dan saat nilai input berubah
        tampilkanUsia();
        tanggalLahirInput.addEventListener('change', tampilkanUsia);

        // Validasi format nomor handphone
        const noHpInput = document.getElementById('no_hp');
        noHpInput.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 13) {
                this.value = this.value.slice(0, 13);
            }
        });

        // Implementasi auto-save form
        const form = document.querySelector('form');
        const formInputs = form.querySelectorAll('input, select, textarea');
        
        // Fungsi untuk menyimpan data form ke localStorage
        function saveFormData() {
            const formData = {};
            formInputs.forEach(input => {
                if (input.name && input.name !== '_token') {
                    if (input.type === 'checkbox' || input.type === 'radio') {
                        formData[input.name] = input.checked;
                    } else {
                        formData[input.name] = input.value;
                    }
                }
            });
            localStorage.setItem('pendaftaran_step1_{{ $siswa->id }}', JSON.stringify(formData));
        }
        
        // Muat data form dari localStorage jika ada
        function loadFormData() {
            const savedData = localStorage.getItem('pendaftaran_step1_{{ $siswa->id }}');
            if (savedData) {
                const formData = JSON.parse(savedData);
                formInputs.forEach(input => {
                    if (input.name && formData[input.name] !== undefined && input.name !== '_token') {
                        if (input.type === 'checkbox' || input.type === 'radio') {
                            input.checked = formData[input.name];
                        } else {
                            input.value = formData[input.name];
                        }
                    }
                });
                // Recalculate age after loading data
                tampilkanUsia();
            }
        }
        
        // Auto-save pada perubahan input
        formInputs.forEach(input => {
            input.addEventListener('change', saveFormData);
            input.addEventListener('keyup', saveFormData);
        });
        
        // Hapus data tersimpan setelah submit berhasil
        form.addEventListener('submit', function() {
            localStorage.removeItem('pendaftaran_step1_{{ $siswa->id }}');
        });
        
        // Load saved data on page load
        loadFormData();
    });
</script>
@endsection 