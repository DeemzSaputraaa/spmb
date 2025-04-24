<form action="{{ route('admin.siswa.pendaftaran.step2', $siswa->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i>
        Jalur pendaftaran yang Anda pilih: <strong>{{ $pendaftaran->jalur_pendaftaran }}</strong>
    </div>
    
    @if($pendaftaran->jalur_pendaftaran == 'Jalur Afirmasi')
        <div class="form-group">
            <label for="bukti_afirmasi" class="form-label">Bukti Keikutsertaan dalam Program Afirmasi</label>
            <input type="file" name="bukti_afirmasi" id="bukti_afirmasi" class="form-control @error('bukti_afirmasi') is-invalid @enderror"
                 accept="application/pdf,image/*">
            @error('bukti_afirmasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Upload surat keterangan/kartu keluarga sejahtera/bukti pendukung lainnya. Format PDF atau gambar (JPG, PNG)</small>
            
            @if(!empty($pendaftaran->bukti_afirmasi))
                <div class="mt-2">
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> 
                        File telah diupload: {{ $pendaftaran->bukti_afirmasi }}
                    </small>
                </div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="keterangan_afirmasi" class="form-label">Keterangan Afirmasi</label>
            <textarea name="keterangan_afirmasi" id="keterangan_afirmasi" rows="3" class="form-control @error('keterangan_afirmasi') is-invalid @enderror">{{ old('keterangan_afirmasi', $pendaftaran->keterangan_afirmasi ?? '') }}</textarea>
            @error('keterangan_afirmasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
    @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Domisili')
        <div class="form-group">
            <label for="bukti_domisili" class="form-label">Bukti Domisili</label>
            <input type="file" name="bukti_domisili" id="bukti_domisili" class="form-control @error('bukti_domisili') is-invalid @enderror"
                 accept="application/pdf,image/*">
            @error('bukti_domisili')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Upload kartu keluarga/surat keterangan domisili. Format PDF atau gambar (JPG, PNG)</small>
            
            @if(!empty($pendaftaran->bukti_domisili))
                <div class="mt-2">
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> 
                        File telah diupload: {{ $pendaftaran->bukti_domisili }}
                    </small>
                </div>
            @endif
        </div>
        
        <div class="form-group">
            <label for="jarak_rumah" class="form-label">Jarak Rumah ke Sekolah (km)</label>
            <input type="number" step="0.01" name="jarak_rumah" id="jarak_rumah" class="form-control @error('jarak_rumah') is-invalid @enderror"
                   value="{{ old('jarak_rumah', $pendaftaran->jarak_rumah ?? '') }}">
            @error('jarak_rumah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    
    @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Prestasi')
        <div class="form-group">
            <label for="jenis_prestasi" class="form-label">Jenis Prestasi</label>
            <select name="jenis_prestasi" id="jenis_prestasi" class="form-select @error('jenis_prestasi') is-invalid @enderror">
                <option value="" disabled {{ old('jenis_prestasi', $pendaftaran->jenis_prestasi ?? '') ? '' : 'selected' }}>-- Pilih Jenis Prestasi --</option>
                <option value="Akademik" {{ old('jenis_prestasi', $pendaftaran->jenis_prestasi ?? '') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                <option value="Non-Akademik" {{ old('jenis_prestasi', $pendaftaran->jenis_prestasi ?? '') == 'Non-Akademik' ? 'selected' : '' }}>Non-Akademik</option>
            </select>
            @error('jenis_prestasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="tingkat_prestasi" class="form-label">Tingkat Prestasi</label>
            <select name="tingkat_prestasi" id="tingkat_prestasi" class="form-select @error('tingkat_prestasi') is-invalid @enderror">
                <option value="" disabled {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') ? '' : 'selected' }}>-- Pilih Tingkat Prestasi --</option>
                <option value="Kabupaten/Kota" {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') == 'Kabupaten/Kota' ? 'selected' : '' }}>Kabupaten/Kota</option>
                <option value="Provinsi" {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') == 'Provinsi' ? 'selected' : '' }}>Provinsi</option>
                <option value="Nasional" {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                <option value="Internasional" {{ old('tingkat_prestasi', $pendaftaran->tingkat_prestasi ?? '') == 'Internasional' ? 'selected' : '' }}>Internasional</option>
            </select>
            @error('tingkat_prestasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="nama_prestasi" class="form-label">Nama Prestasi/Penghargaan</label>
            <input type="text" name="nama_prestasi" id="nama_prestasi" class="form-control @error('nama_prestasi') is-invalid @enderror"
                   value="{{ old('nama_prestasi', $pendaftaran->nama_prestasi ?? '') }}">
            @error('nama_prestasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="tahun_prestasi" class="form-label">Tahun Prestasi</label>
            <input type="number" min="2000" max="{{ date('Y') }}" name="tahun_prestasi" id="tahun_prestasi" class="form-control @error('tahun_prestasi') is-invalid @enderror"
                   value="{{ old('tahun_prestasi', $pendaftaran->tahun_prestasi ?? '') }}">
            @error('tahun_prestasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="bukti_prestasi" class="form-label">Bukti Prestasi</label>
            <input type="file" name="bukti_prestasi" id="bukti_prestasi" class="form-control @error('bukti_prestasi') is-invalid @enderror"
                 accept="application/pdf,image/*">
            @error('bukti_prestasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Upload sertifikat/piagam penghargaan. Format PDF atau gambar (JPG, PNG)</small>
            
            @if(!empty($pendaftaran->bukti_prestasi))
                <div class="mt-2">
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> 
                        File telah diupload: {{ $pendaftaran->bukti_prestasi }}
                    </small>
                </div>
            @endif
        </div>
    
    @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Mutasi')
        <div class="form-group">
            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
            <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror"
                   value="{{ old('asal_sekolah', $pendaftaran->asal_sekolah ?? '') }}">
            @error('asal_sekolah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="alasan_mutasi" class="form-label">Alasan Mutasi</label>
            <textarea name="alasan_mutasi" id="alasan_mutasi" rows="3" class="form-control @error('alasan_mutasi') is-invalid @enderror">{{ old('alasan_mutasi', $pendaftaran->alasan_mutasi ?? '') }}</textarea>
            @error('alasan_mutasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="bukti_mutasi" class="form-label">Bukti Mutasi</label>
            <input type="file" name="bukti_mutasi" id="bukti_mutasi" class="form-control @error('bukti_mutasi') is-invalid @enderror"
                 accept="application/pdf,image/*">
            @error('bukti_mutasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Upload surat keterangan pindah/mutasi dari sekolah asal. Format PDF atau gambar (JPG, PNG)</small>
            
            @if(!empty($pendaftaran->bukti_mutasi))
                <div class="mt-2">
                    <small class="text-success">
                        <i class="fas fa-check-circle"></i> 
                        File telah diupload: {{ $pendaftaran->bukti_mutasi }}
                    </small>
                </div>
            @endif
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