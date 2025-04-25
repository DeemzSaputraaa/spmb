<form action="{{ route('admin.siswa.pendaftaran.step2', $siswa->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="card mb-4">
        <div class="card-body bg-light">
            <div class="d-flex">
                <i class="fas fa-info-circle text-primary me-2 mt-1"></i>
                <div>
                    <p class="mb-0">Jalur pendaftaran yang Anda pilih: <strong>{{ $pendaftaran->jalur_pendaftaran }}</strong></p>
                    <p class="mb-0"><span class="text-danger">*</span> menandakan field yang wajib diisi</p>
                    <p class="small mb-0">Semua berkas dalam format PDF/JPEG/PNG, maksimal ukuran 2 MB</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="mb-4">
        <h5 class="border-bottom pb-2">Persyaratan Berkas</h5>
    </div>
    
    <!-- Foto 3x4 (Semua jalur) -->
    <div class="form-group">
        <label for="foto" class="form-label">1. Foto 3X4 <span class="text-danger">*</span></label>
        <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror"
             accept="application/pdf,image/*" {{ empty($pendaftaran->foto) ? 'required' : '' }}>
        @error('foto')
            <div class="alert alert-danger mt-2">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ $errors->first('foto') }}
            </div>
        @enderror
        
        @if(!empty($pendaftaran->foto))
            <div class="mt-2">
                <small class="text-success">
                    <i class="fas fa-check-circle"></i> 
                    File telah diupload: {{ $pendaftaran->foto }}
                </small>
            </div>
            <input type="hidden" name="foto_exists" value="1">
        @endif
    </div>
    
    <!-- Ijazah (Semua jalur) -->
    <div class="form-group">
        <label for="ijazah" class="form-label">2. Ijazah <span class="text-danger">*</span></label>
        <input type="file" name="ijazah" id="ijazah" class="form-control @error('ijazah') is-invalid @enderror"
             accept="application/pdf,image/*" {{ empty($pendaftaran->ijazah) ? 'required' : '' }}>
        @error('ijazah')
            <div class="alert alert-danger mt-2">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ $errors->first('ijazah') }}
            </div>
        @enderror
        
        @if(!empty($pendaftaran->ijazah))
            <div class="mt-2">
                <small class="text-success">
                    <i class="fas fa-check-circle"></i> 
                    File telah diupload: {{ $pendaftaran->ijazah }}
                </small>
            </div>
            <input type="hidden" name="ijazah_exists" value="1">
        @endif
    </div>
    
    <!-- Akte Kelahiran (Semua jalur) -->
    <div class="form-group">
        <label for="akte_kelahiran" class="form-label">3. Akte Kelahiran <span class="text-danger">*</span></label>
        <input type="file" name="akte_kelahiran" id="akte_kelahiran" class="form-control @error('akte_kelahiran') is-invalid @enderror"
             accept="application/pdf,image/*" {{ empty($pendaftaran->akte_kelahiran) ? 'required' : '' }}>
        @error('akte_kelahiran')
            <div class="alert alert-danger mt-2">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ $errors->first('akte_kelahiran') }}
            </div>
        @enderror
        
        @if(!empty($pendaftaran->akte_kelahiran))
            <div class="mt-2">
                <small class="text-success">
                    <i class="fas fa-check-circle"></i> 
                    File telah diupload: {{ $pendaftaran->akte_kelahiran }}
                </small>
            </div>
            <input type="hidden" name="akte_kelahiran_exists" value="1">
        @endif
    </div>
    
    <!-- Kartu Keluarga (Semua jalur) -->
    <div class="form-group">
        <label for="kartu_keluarga" class="form-label">4. Kartu Keluarga <span class="text-danger">*</span></label>
        <input type="file" name="kartu_keluarga" id="kartu_keluarga" class="form-control @error('kartu_keluarga') is-invalid @enderror"
             accept="application/pdf,image/*" {{ empty($pendaftaran->kartu_keluarga) ? 'required' : '' }}>
        @error('kartu_keluarga')
            <div class="alert alert-danger mt-2">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ $errors->first('kartu_keluarga') }}
            </div>
        @enderror
        
        @if(!empty($pendaftaran->kartu_keluarga))
            <div class="mt-2">
                <small class="text-success">
                    <i class="fas fa-check-circle"></i> 
                    File telah diupload: {{ $pendaftaran->kartu_keluarga }}
                </small>
            </div>
            <input type="hidden" name="kartu_keluarga_exists" value="1">
        @endif
    </div>
    
    <!-- KTP Orang Tua (Semua jalur) -->
    <div class="form-group">
        <label for="ktp_ortu" class="form-label">5. KTP Orang Tua <span class="text-danger">*</span></label>
        <input type="file" name="ktp_ortu" id="ktp_ortu" class="form-control @error('ktp_ortu') is-invalid @enderror"
             accept="application/pdf,image/*" {{ empty($pendaftaran->ktp_ortu) ? 'required' : '' }}>
        @error('ktp_ortu')
            <div class="alert alert-danger mt-2">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ $errors->first('ktp_ortu') }}
            </div>
        @enderror
        
        @if(!empty($pendaftaran->ktp_ortu))
            <div class="mt-2">
                <small class="text-success">
                    <i class="fas fa-check-circle"></i> 
                    File telah diupload: {{ $pendaftaran->ktp_ortu }}
                </small>
            </div>
            <input type="hidden" name="ktp_ortu_exists" value="1">
        @endif
    </div>
    
    @if($pendaftaran->jalur_pendaftaran == 'Jalur Afirmasi')
        <!-- SKTM (Jalur Afirmasi) -->
        <div class="form-group">
            <label for="bukti_afirmasi" class="form-label">6. SKTM (Surat Keterangan Tidak Mampu) <span class="text-danger">*</span></label>
            <input type="file" name="bukti_afirmasi" id="bukti_afirmasi" class="form-control @error('bukti_afirmasi') is-invalid @enderror"
                 accept="application/pdf,image/*" {{ empty($pendaftaran->bukti_afirmasi) ? 'required' : '' }}>
            @error('bukti_afirmasi')
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first('bukti_afirmasi') }}
                </div>
            @enderror
            
            @if(!empty($pendaftaran->bukti_afirmasi))
                <div class="mt-2">
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> 
                        File telah diupload: {{ $pendaftaran->bukti_afirmasi }}
                    </small>
                </div>
                <input type="hidden" name="bukti_afirmasi_exists" value="1">
            @endif
        </div>
        
        <div class="form-group">
            <label for="keterangan_afirmasi" class="form-label">Keterangan Tambahan <span class="text-danger">*</span></label>
            <textarea name="keterangan_afirmasi" id="keterangan_afirmasi" rows="3" class="form-control @error('keterangan_afirmasi') is-invalid @enderror" 
                placeholder="Keterangan tambahan (jika ada)" required>{{ old('keterangan_afirmasi', $pendaftaran->keterangan_afirmasi ?? '') }}</textarea>
            @error('keterangan_afirmasi')
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first('keterangan_afirmasi') }}
                </div>
            @enderror
        </div>
    
    @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Prestasi')
        <!-- Piagam (Jalur Prestasi) -->
        <div class="form-group">
            <label for="bukti_prestasi" class="form-label">6. Piagam atau Sertifikat Prestasi <span class="text-danger">*</span></label>
            <input type="file" name="bukti_prestasi" id="bukti_prestasi" class="form-control @error('bukti_prestasi') is-invalid @enderror"
                 accept="application/pdf,image/*" {{ empty($pendaftaran->bukti_prestasi) ? 'required' : '' }}>
            @error('bukti_prestasi')
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first('bukti_prestasi') }}
                </div>
            @enderror
            
            @if(!empty($pendaftaran->bukti_prestasi))
                <div class="mt-2">
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> 
                        File telah diupload: {{ $pendaftaran->bukti_prestasi }}
                    </small>
                </div>
                <input type="hidden" name="bukti_prestasi_exists" value="1">
            @endif
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="jenis_prestasi" class="form-label">Jenis Prestasi <span class="text-danger">*</span></label>
                    <select name="jenis_prestasi" id="jenis_prestasi" class="form-select @error('jenis_prestasi') is-invalid @enderror" required>
                        <option value="" disabled {{ old('jenis_prestasi', $pendaftaran->jenis_prestasi ?? '') ? '' : 'selected' }}>-- Pilih Jenis Prestasi --</option>
                        <option value="Akademik" {{ old('jenis_prestasi', $pendaftaran->jenis_prestasi ?? '') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Non-Akademik" {{ old('jenis_prestasi', $pendaftaran->jenis_prestasi ?? '') == 'Non-Akademik' ? 'selected' : '' }}>Non-Akademik</option>
                    </select>
                    @error('jenis_prestasi')
                        <div class="alert alert-danger mt-2">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ $errors->first('jenis_prestasi') }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tingkat_prestasi" class="form-label">Tingkat Prestasi <span class="text-danger">*</span></label>
                    <select name="tingkat_prestasi" id="tingkat_prestasi" class="form-select @error('tingkat_prestasi') is-invalid @enderror" required>
                        <option value="" disabled {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') ? '' : 'selected' }}>-- Pilih Tingkat Prestasi --</option>
                        <option value="Kabupaten/Kota" {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                        <option value="Provinsi" {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                        <option value="Nasional" {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                        <option value="Internasional" {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
                    </select>
                    @error('tingkat_prestasi')
                        <div class="alert alert-danger mt-2">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ $errors->first('tingkat_prestasi') }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nama_prestasi" class="form-label">Nama Prestasi/Penghargaan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_prestasi" id="nama_prestasi" class="form-control @error('nama_prestasi') is-invalid @enderror"
                           value="{{ old('nama_prestasi', $pendaftaran->nama_prestasi ?? '') }}" required>
                    @error('nama_prestasi')
                        <div class="alert alert-danger mt-2">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ $errors->first('nama_prestasi') }}
                        </div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tahun_prestasi" class="form-label">Tahun Prestasi <span class="text-danger">*</span></label>
                    <input type="number" min="2000" max="{{ date('Y') }}" name="tahun_prestasi" id="tahun_prestasi" 
                           class="form-control @error('tahun_prestasi') is-invalid @enderror"
                           value="{{ old('tahun_prestasi', $pendaftaran->tahun_prestasi ?? '') }}" required>
                    @error('tahun_prestasi')
                        <div class="alert alert-danger mt-2">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ $errors->first('tahun_prestasi') }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    
    @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Domisili')
        <!-- Jarak Rumah (Jalur Domisili) -->
        <div class="form-group">
            <label for="jarak_rumah" class="form-label">6. Jarak Rumah ke Sekolah (km) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="jarak_rumah" id="jarak_rumah" class="form-control @error('jarak_rumah') is-invalid @enderror"
                   value="{{ old('jarak_rumah', $pendaftaran->jarak_rumah ?? '') }}" required>
            @error('jarak_rumah')
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first('jarak_rumah') }}
                </div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="bukti_domisili" class="form-label">Bukti Domisili <span class="text-danger">*</span></label>
            <input type="file" name="bukti_domisili" id="bukti_domisili" class="form-control @error('bukti_domisili') is-invalid @enderror"
                 accept="application/pdf,image/*" {{ empty($pendaftaran->bukti_domisili) ? 'required' : '' }}>
            @error('bukti_domisili')
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first('bukti_domisili') }}
                </div>
            @enderror
            <small class="form-text text-muted">Upload dokumen pendukung domisili</small>
            
            @if(!empty($pendaftaran->bukti_domisili))
                <div class="mt-2">
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> 
                        File telah diupload: {{ $pendaftaran->bukti_domisili }}
                    </small>
                </div>
                <input type="hidden" name="bukti_domisili_exists" value="1">
            @endif
        </div>
    
    @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Mutasi')
        <!-- Surat Keterangan Pindah (Jalur Mutasi) -->
        <div class="form-group">
            <label for="bukti_mutasi" class="form-label">6. Surat Keterangan Pindah <span class="text-danger">*</span></label>
            <input type="file" name="bukti_mutasi" id="bukti_mutasi" class="form-control @error('bukti_mutasi') is-invalid @enderror"
                 accept="application/pdf,image/*" {{ empty($pendaftaran->bukti_mutasi) ? 'required' : '' }}>
            @error('bukti_mutasi')
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first('bukti_mutasi') }}
                </div>
            @enderror
            
            @if(!empty($pendaftaran->bukti_mutasi))
                <div class="mt-2">
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> 
                        File telah diupload: {{ $pendaftaran->bukti_mutasi }}
                    </small>
                </div>
                <input type="hidden" name="bukti_mutasi_exists" value="1">
            @endif
        </div>
        
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
        
        <div class="form-group">
            <label for="alasan_mutasi" class="form-label">Alasan Mutasi <span class="text-danger">*</span></label>
            <textarea name="alasan_mutasi" id="alasan_mutasi" rows="3" class="form-control @error('alasan_mutasi') is-invalid @enderror" required>{{ old('alasan_mutasi', $pendaftaran->alasan_mutasi ?? '') }}</textarea>
            @error('alasan_mutasi')
                <div class="alert alert-danger mt-2">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    {{ $errors->first('alasan_mutasi') }}
                </div>
            @enderror
        </div>
    @endif
    
    <div class="wizard-nav">
        <a href="{{ route('admin.siswa.pendaftaran.index', ['siswa_id' => $siswa->id, 'step' => 1]) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Sebelumnya
        </a>
        <button type="submit" class="btn btn-primary">
            Lanjutkan <i class="fas fa-arrow-right ml-1"></i>
        </button>
    </div>
</form>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
                    } else if (input.type === 'file') {
                        // Skip file inputs
                    } else {
                        formData[input.name] = input.value;
                    }
                }
            });
            localStorage.setItem('pendaftaran_step2_{{ $siswa->id }}', JSON.stringify(formData));
        }
        
        // Muat data form dari localStorage jika ada
        function loadFormData() {
            const savedData = localStorage.getItem('pendaftaran_step2_{{ $siswa->id }}');
            if (savedData) {
                const formData = JSON.parse(savedData);
                formInputs.forEach(input => {
                    if (input.name && formData[input.name] !== undefined && 
                        input.name !== '_token' && input.type !== 'file') {
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
            if (input.type !== 'file') { // Skip file inputs
                input.addEventListener('change', saveFormData);
                input.addEventListener('keyup', saveFormData);
            }
        });
        
        // Hapus data tersimpan setelah submit berhasil
        form.addEventListener('submit', function() {
            localStorage.removeItem('pendaftaran_step2_{{ $siswa->id }}');
        });
        
        // Load saved data on page load
        loadFormData();
    });
</script>
@endpush 