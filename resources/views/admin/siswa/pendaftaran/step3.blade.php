<form action="{{ route('admin.siswa.pendaftaran.step3', $siswa->id) }}" method="POST">
    @csrf
    
    <div class="card mb-4">
        <div class="card-body bg-light">
            <div class="d-flex align-items-center">
                <i class="fas fa-info-circle text-primary me-2"></i>
                <p class="mb-0"><span class="text-danger">*</span> menandakan field yang wajib diisi</p>
            </div>
        </div>
    </div>
    
    <div class="mb-4">
        <h5 class="border-bottom pb-2">Data Orang Tua</h5>
    </div>

    <h5 class="mb-4">Data Ayah</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nik_ayah" class="form-label">NIK Ayah <span class="text-danger">*</span></label>
                <input type="text" name="nik_ayah" id="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" 
                       value="{{ old('nik_ayah', $pendaftaran->nik_ayah ?? '') }}" required maxlength="16" minlength="16">
                @error('nik_ayah')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('nik_ayah') }}
                    </div>
                @enderror
                <small class="text-muted">Masukkan 16 digit NIK</small>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_ayah" class="form-label">Nama Ayah <span class="text-danger">*</span></label>
                <input type="text" name="nama_ayah" id="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" 
                       value="{{ old('nama_ayah', $pendaftaran->nama_ayah ?? '') }}" required>
                @error('nama_ayah')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('nama_ayah') }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah <span class="text-danger">*</span></label>
                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" 
                       value="{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah ?? '') }}" required>
                @error('pekerjaan_ayah')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('pekerjaan_ayah') }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="pendidikan_ayah" class="form-label">Pendidikan Ayah <span class="text-danger">*</span></label>
                <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-select @error('pendidikan_ayah') is-invalid @enderror" required>
                    <option value="" disabled {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') ? '' : 'selected' }}>-- Pilih Pendidikan --</option>
                    <option value="Tidak Sekolah" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                    <option value="SD/Sederajat" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat</option>
                    <option value="SMP/Sederajat" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                    <option value="SMA/Sederajat" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                    <option value="D1" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'D1' ? 'selected' : '' }}>D1</option>
                    <option value="D2" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'D2' ? 'selected' : '' }}>D2</option>
                    <option value="D3" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                    <option value="D4/S1" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'D4/S1' ? 'selected' : '' }}>D4/S1</option>
                    <option value="S2" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                    <option value="S3" {{ old('pendidikan_ayah', $pendaftaran->pendidikan_ayah ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                </select>
                @error('pendidikan_ayah')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('pendidikan_ayah') }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="no_hp_ayah" class="form-label">No. Handphone Ayah <span class="text-danger">*</span></label>
                <input type="tel" name="no_hp_ayah" id="no_hp_ayah" class="form-control @error('no_hp_ayah') is-invalid @enderror" 
                       value="{{ old('no_hp_ayah', $pendaftaran->no_hp_ayah ?? '') }}" required pattern="[0-9]{10,13}">
                @error('no_hp_ayah')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('no_hp_ayah') }}
                    </div>
                @enderror
                <small class="text-muted">Format: 08xxxxxxxxxx (10-13 digit)</small>
            </div>
        </div>
    </div>
    
    <hr class="my-4">
    
    <h5 class="mb-4">Data Ibu</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nik_ibu" class="form-label">NIK Ibu <span class="text-danger">*</span></label>
                <input type="text" name="nik_ibu" id="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" 
                       value="{{ old('nik_ibu', $pendaftaran->nik_ibu ?? '') }}" required maxlength="16" minlength="16">
                @error('nik_ibu')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('nik_ibu') }}
                    </div>
                @enderror
                <small class="text-muted">Masukkan 16 digit NIK</small>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_ibu" class="form-label">Nama Ibu <span class="text-danger">*</span></label>
                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" 
                       value="{{ old('nama_ibu', $pendaftaran->nama_ibu ?? '') }}" required>
                @error('nama_ibu')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('nama_ibu') }}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu <span class="text-danger">*</span></label>
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" 
                       value="{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu ?? '') }}" required>
                @error('pekerjaan_ibu')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('pekerjaan_ibu') }}
                    </div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="pendidikan_ibu" class="form-label">Pendidikan Ibu <span class="text-danger">*</span></label>
                <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-select @error('pendidikan_ibu') is-invalid @enderror" required>
                    <option value="" disabled {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') ? '' : 'selected' }}>-- Pilih Pendidikan --</option>
                    <option value="Tidak Sekolah" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                    <option value="SD/Sederajat" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat</option>
                    <option value="SMP/Sederajat" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                    <option value="SMA/Sederajat" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                    <option value="D1" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'D1' ? 'selected' : '' }}>D1</option>
                    <option value="D2" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'D2' ? 'selected' : '' }}>D2</option>
                    <option value="D3" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                    <option value="D4/S1" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'D4/S1' ? 'selected' : '' }}>D4/S1</option>
                    <option value="S2" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                    <option value="S3" {{ old('pendidikan_ibu', $pendaftaran->pendidikan_ibu ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                </select>
                @error('pendidikan_ibu')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('pendidikan_ibu') }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="form-group">
                <label for="no_hp_ibu" class="form-label">No. Handphone Ibu <span class="text-danger">*</span></label>
                <input type="tel" name="no_hp_ibu" id="no_hp_ibu" class="form-control @error('no_hp_ibu') is-invalid @enderror" 
                       value="{{ old('no_hp_ibu', $pendaftaran->no_hp_ibu ?? '') }}" required pattern="[0-9]{10,13}">
                @error('no_hp_ibu')
                    <div class="alert alert-danger mt-2">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ $errors->first('no_hp_ibu') }}
                    </div>
                @enderror
                <small class="text-muted">Format: 08xxxxxxxxxx (10-13 digit)</small>
            </div>
        </div>
    </div>
    
    <div class="wizard-nav">
        <a href="{{ route('admin.siswa.pendaftaran.index', ['siswa_id' => $siswa->id, 'step' => 2]) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Sebelumnya
        </a>
        <button type="submit" class="btn btn-primary">
            Lanjutkan <i class="fas fa-arrow-right ml-1"></i>
        </button>
    </div>
</form>

@push('scripts')
<script>
    // Validasi format nomor handphone
    document.querySelectorAll('input[type="tel"]').forEach(function(input) {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value.length > 13) {
                this.value = this.value.slice(0, 13);
            }
        });
    });

    // Implementasi auto-save form
    document.addEventListener('DOMContentLoaded', function() {
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
            localStorage.setItem('pendaftaran_step3_{{ $siswa->id }}', JSON.stringify(formData));
        }
        
        // Muat data form dari localStorage jika ada
        function loadFormData() {
            const savedData = localStorage.getItem('pendaftaran_step3_{{ $siswa->id }}');
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
            }
        }
        
        // Auto-save pada perubahan input
        formInputs.forEach(input => {
            input.addEventListener('change', saveFormData);
            input.addEventListener('keyup', saveFormData);
        });
        
        // Hapus data tersimpan setelah submit berhasil
        form.addEventListener('submit', function() {
            localStorage.removeItem('pendaftaran_step3_{{ $siswa->id }}');
        });
        
        // Load saved data on page load
        loadFormData();
    });
</script>
@endpush 