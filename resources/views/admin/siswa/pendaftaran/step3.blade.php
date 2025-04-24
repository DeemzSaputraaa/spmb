<form action="{{ route('admin.siswa.pendaftaran.step3', $siswa->id) }}" method="POST">
    @csrf
    
    <h5 class="mb-4">Data Ayah</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_ayah" class="form-label">Nama Ayah</label>
                <input type="text" name="nama_ayah" id="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" 
                       value="{{ old('nama_ayah', $pendaftaran->nama_ayah ?? '') }}" required>
                @error('nama_ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="nik_ayah" class="form-label">NIK Ayah</label>
                <input type="text" name="nik_ayah" id="nik_ayah" class="form-control @error('nik_ayah') is-invalid @enderror" 
                       value="{{ old('nik_ayah', $pendaftaran->nik_ayah ?? '') }}">
                @error('nik_ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun_lahir_ayah" class="form-label">Tahun Lahir Ayah</label>
                <input type="number" name="tahun_lahir_ayah" id="tahun_lahir_ayah" class="form-control @error('tahun_lahir_ayah') is-invalid @enderror" 
                       value="{{ old('tahun_lahir_ayah', $pendaftaran->tahun_lahir_ayah ?? '') }}" min="1950" max="{{ date('Y') - 15 }}">
                @error('tahun_lahir_ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="pendidikan_ayah" class="form-label">Pendidikan Ayah</label>
                <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-select @error('pendidikan_ayah') is-invalid @enderror">
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
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="pekerjaan_ayah" class="form-label">Pekerjaan Ayah</label>
                <input type="text" name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" 
                       value="{{ old('pekerjaan_ayah', $pendaftaran->pekerjaan_ayah ?? '') }}">
                @error('pekerjaan_ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="penghasilan_ayah" class="form-label">Penghasilan Ayah</label>
                <select name="penghasilan_ayah" id="penghasilan_ayah" class="form-select @error('penghasilan_ayah') is-invalid @enderror">
                    <option value="" disabled {{ old('penghasilan_ayah', $pendaftaran->penghasilan_ayah ?? '') ? '' : 'selected' }}>-- Pilih Penghasilan --</option>
                    <option value="Kurang dari Rp. 1.000.000" {{ old('penghasilan_ayah', $pendaftaran->penghasilan_ayah ?? '') == 'Kurang dari Rp. 1.000.000' ? 'selected' : '' }}>Kurang dari Rp. 1.000.000</option>
                    <option value="Rp. 1.000.000 - Rp. 2.000.000" {{ old('penghasilan_ayah', $pendaftaran->penghasilan_ayah ?? '') == 'Rp. 1.000.000 - Rp. 2.000.000' ? 'selected' : '' }}>Rp. 1.000.000 - Rp. 2.000.000</option>
                    <option value="Rp. 2.000.000 - Rp. 3.000.000" {{ old('penghasilan_ayah', $pendaftaran->penghasilan_ayah ?? '') == 'Rp. 2.000.000 - Rp. 3.000.000' ? 'selected' : '' }}>Rp. 2.000.000 - Rp. 3.000.000</option>
                    <option value="Rp. 3.000.000 - Rp. 5.000.000" {{ old('penghasilan_ayah', $pendaftaran->penghasilan_ayah ?? '') == 'Rp. 3.000.000 - Rp. 5.000.000' ? 'selected' : '' }}>Rp. 3.000.000 - Rp. 5.000.000</option>
                    <option value="Lebih dari Rp. 5.000.000" {{ old('penghasilan_ayah', $pendaftaran->penghasilan_ayah ?? '') == 'Lebih dari Rp. 5.000.000' ? 'selected' : '' }}>Lebih dari Rp. 5.000.000</option>
                </select>
                @error('penghasilan_ayah')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <hr class="my-4">
    
    <h5 class="mb-4">Data Ibu</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" 
                       value="{{ old('nama_ibu', $pendaftaran->nama_ibu ?? '') }}" required>
                @error('nama_ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="nik_ibu" class="form-label">NIK Ibu</label>
                <input type="text" name="nik_ibu" id="nik_ibu" class="form-control @error('nik_ibu') is-invalid @enderror" 
                       value="{{ old('nik_ibu', $pendaftaran->nik_ibu ?? '') }}">
                @error('nik_ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tahun_lahir_ibu" class="form-label">Tahun Lahir Ibu</label>
                <input type="number" name="tahun_lahir_ibu" id="tahun_lahir_ibu" class="form-control @error('tahun_lahir_ibu') is-invalid @enderror" 
                       value="{{ old('tahun_lahir_ibu', $pendaftaran->tahun_lahir_ibu ?? '') }}" min="1950" max="{{ date('Y') - 15 }}">
                @error('tahun_lahir_ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="pendidikan_ibu" class="form-label">Pendidikan Ibu</label>
                <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-select @error('pendidikan_ibu') is-invalid @enderror">
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
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="pekerjaan_ibu" class="form-label">Pekerjaan Ibu</label>
                <input type="text" name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" 
                       value="{{ old('pekerjaan_ibu', $pendaftaran->pekerjaan_ibu ?? '') }}">
                @error('pekerjaan_ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="penghasilan_ibu" class="form-label">Penghasilan Ibu</label>
                <select name="penghasilan_ibu" id="penghasilan_ibu" class="form-select @error('penghasilan_ibu') is-invalid @enderror">
                    <option value="" disabled {{ old('penghasilan_ibu', $pendaftaran->penghasilan_ibu ?? '') ? '' : 'selected' }}>-- Pilih Penghasilan --</option>
                    <option value="Kurang dari Rp. 1.000.000" {{ old('penghasilan_ibu', $pendaftaran->penghasilan_ibu ?? '') == 'Kurang dari Rp. 1.000.000' ? 'selected' : '' }}>Kurang dari Rp. 1.000.000</option>
                    <option value="Rp. 1.000.000 - Rp. 2.000.000" {{ old('penghasilan_ibu', $pendaftaran->penghasilan_ibu ?? '') == 'Rp. 1.000.000 - Rp. 2.000.000' ? 'selected' : '' }}>Rp. 1.000.000 - Rp. 2.000.000</option>
                    <option value="Rp. 2.000.000 - Rp. 3.000.000" {{ old('penghasilan_ibu', $pendaftaran->penghasilan_ibu ?? '') == 'Rp. 2.000.000 - Rp. 3.000.000' ? 'selected' : '' }}>Rp. 2.000.000 - Rp. 3.000.000</option>
                    <option value="Rp. 3.000.000 - Rp. 5.000.000" {{ old('penghasilan_ibu', $pendaftaran->penghasilan_ibu ?? '') == 'Rp. 3.000.000 - Rp. 5.000.000' ? 'selected' : '' }}>Rp. 3.000.000 - Rp. 5.000.000</option>
                    <option value="Lebih dari Rp. 5.000.000" {{ old('penghasilan_ibu', $pendaftaran->penghasilan_ibu ?? '') == 'Lebih dari Rp. 5.000.000' ? 'selected' : '' }}>Lebih dari Rp. 5.000.000</option>
                </select>
                @error('penghasilan_ibu')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    
    <hr class="my-4">
    
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="ada_wali" id="ada_wali" value="1"
                   {{ old('ada_wali', $pendaftaran->ada_wali ?? 0) == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="ada_wali">
                Siswa memiliki Wali (selain Orang Tua)
            </label>
        </div>
    </div>
    
    <div id="data_wali" style="{{ old('ada_wali', $pendaftaran->ada_wali ?? 0) == 1 ? '' : 'display: none;' }}">
        <h5 class="mb-4">Data Wali</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_wali" class="form-label">Nama Wali</label>
                    <input type="text" name="nama_wali" id="nama_wali" class="form-control @error('nama_wali') is-invalid @enderror" 
                           value="{{ old('nama_wali', $pendaftaran->nama_wali ?? '') }}">
                    @error('nama_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nik_wali" class="form-label">NIK Wali</label>
                    <input type="text" name="nik_wali" id="nik_wali" class="form-control @error('nik_wali') is-invalid @enderror" 
                           value="{{ old('nik_wali', $pendaftaran->nik_wali ?? '') }}">
                    @error('nik_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun_lahir_wali" class="form-label">Tahun Lahir Wali</label>
                    <input type="number" name="tahun_lahir_wali" id="tahun_lahir_wali" class="form-control @error('tahun_lahir_wali') is-invalid @enderror" 
                           value="{{ old('tahun_lahir_wali', $pendaftaran->tahun_lahir_wali ?? '') }}" min="1950" max="{{ date('Y') - 15 }}">
                    @error('tahun_lahir_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pendidikan_wali" class="form-label">Pendidikan Wali</label>
                    <select name="pendidikan_wali" id="pendidikan_wali" class="form-select @error('pendidikan_wali') is-invalid @enderror">
                        <option value="" disabled {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') ? '' : 'selected' }}>-- Pilih Pendidikan --</option>
                        <option value="Tidak Sekolah" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'Tidak Sekolah' ? 'selected' : '' }}>Tidak Sekolah</option>
                        <option value="SD/Sederajat" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'SD/Sederajat' ? 'selected' : '' }}>SD/Sederajat</option>
                        <option value="SMP/Sederajat" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'SMP/Sederajat' ? 'selected' : '' }}>SMP/Sederajat</option>
                        <option value="SMA/Sederajat" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'SMA/Sederajat' ? 'selected' : '' }}>SMA/Sederajat</option>
                        <option value="D1" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'D1' ? 'selected' : '' }}>D1</option>
                        <option value="D2" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'D2' ? 'selected' : '' }}>D2</option>
                        <option value="D3" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                        <option value="D4/S1" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'D4/S1' ? 'selected' : '' }}>D4/S1</option>
                        <option value="S2" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                        <option value="S3" {{ old('pendidikan_wali', $pendaftaran->pendidikan_wali ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                    </select>
                    @error('pendidikan_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pekerjaan_wali" class="form-label">Pekerjaan Wali</label>
                    <input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="form-control @error('pekerjaan_wali') is-invalid @enderror" 
                           value="{{ old('pekerjaan_wali', $pendaftaran->pekerjaan_wali ?? '') }}">
                    @error('pekerjaan_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="penghasilan_wali" class="form-label">Penghasilan Wali</label>
                    <select name="penghasilan_wali" id="penghasilan_wali" class="form-select @error('penghasilan_wali') is-invalid @enderror">
                        <option value="" disabled {{ old('penghasilan_wali', $pendaftaran->penghasilan_wali ?? '') ? '' : 'selected' }}>-- Pilih Penghasilan --</option>
                        <option value="Kurang dari Rp. 1.000.000" {{ old('penghasilan_wali', $pendaftaran->penghasilan_wali ?? '') == 'Kurang dari Rp. 1.000.000' ? 'selected' : '' }}>Kurang dari Rp. 1.000.000</option>
                        <option value="Rp. 1.000.000 - Rp. 2.000.000" {{ old('penghasilan_wali', $pendaftaran->penghasilan_wali ?? '') == 'Rp. 1.000.000 - Rp. 2.000.000' ? 'selected' : '' }}>Rp. 1.000.000 - Rp. 2.000.000</option>
                        <option value="Rp. 2.000.000 - Rp. 3.000.000" {{ old('penghasilan_wali', $pendaftaran->penghasilan_wali ?? '') == 'Rp. 2.000.000 - Rp. 3.000.000' ? 'selected' : '' }}>Rp. 2.000.000 - Rp. 3.000.000</option>
                        <option value="Rp. 3.000.000 - Rp. 5.000.000" {{ old('penghasilan_wali', $pendaftaran->penghasilan_wali ?? '') == 'Rp. 3.000.000 - Rp. 5.000.000' ? 'selected' : '' }}>Rp. 3.000.000 - Rp. 5.000.000</option>
                        <option value="Lebih dari Rp. 5.000.000" {{ old('penghasilan_wali', $pendaftaran->penghasilan_wali ?? '') == 'Lebih dari Rp. 5.000.000' ? 'selected' : '' }}>Lebih dari Rp. 5.000.000</option>
                    </select>
                    @error('penghasilan_wali')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
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

@section('scripts')
@parent
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const adaWaliCheckbox = document.getElementById('ada_wali');
        const dataWaliDiv = document.getElementById('data_wali');
        
        // Fungsi untuk menampilkan/menyembunyikan form data wali
        function toggleDataWali() {
            if (adaWaliCheckbox.checked) {
                dataWaliDiv.style.display = 'block';
            } else {
                dataWaliDiv.style.display = 'none';
            }
        }
        
        // Panggil fungsi saat halaman dimuat dan saat checkbox berubah
        adaWaliCheckbox.addEventListener('change', toggleDataWali);
    });
</script>
@endsection 