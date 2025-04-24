<form action="{{ route('admin.siswa.pendaftaran.step4', $siswa->id) }}" method="POST" id="formKonfirmasi">
    @csrf
    
    <div class="alert alert-info mb-4">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <i class="fas fa-info-circle fa-2x"></i>
            </div>
            <div>
                <h5 class="alert-heading mb-1">Konfirmasi Data Pendaftaran</h5>
                <p class="mb-0">Silakan periksa kembali data yang telah dimasukkan sebelum menyelesaikan pendaftaran</p>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h6 class="m-0 font-weight-bold">Data Siswa</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td width="40%"><strong>NISN</strong></td>
                            <td>: {{ $pendaftaran->nisn }}</td>
                        </tr>
                        <tr>
                            <td><strong>NIK</strong></td>
                            <td>: {{ $pendaftaran->nik }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Lengkap</strong></td>
                            <td>: {{ $siswa->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tempat, Tanggal Lahir</strong></td>
                            <td>: {{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td><strong>No. Akta Lahir</strong></td>
                            <td>: {{ $pendaftaran->no_akta_lahir }}</td>
                        </tr>
                        <tr>
                            <td><strong>Jurusan</strong></td>
                            <td>: {{ $pendaftaran->jurusan }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td width="40%"><strong>Agama</strong></td>
                            <td>: {{ $pendaftaran->agama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Asal Sekolah</strong></td>
                            <td>: {{ $pendaftaran->asal_sekolah }}</td>
                        </tr>
                        <tr>
                            <td><strong>No. Handphone</strong></td>
                            <td>: {{ $pendaftaran->no_hp }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>: {{ $pendaftaran->email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>: {{ $pendaftaran->alamat_jalan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Kelurahan/Desa</strong></td>
                            <td>: {{ $pendaftaran->kelurahan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Kecamatan</strong></td>
                            <td>: {{ $pendaftaran->kecamatan }}</td>
                        </tr>
                        <tr>
                            <td><strong>Kabupaten/Kota</strong></td>
                            <td>: {{ $pendaftaran->kabupaten }}</td>
                        </tr>
                        <tr>
                            <td><strong>Provinsi</strong></td>
                            <td>: {{ $pendaftaran->provinsi }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.siswa.pendaftaran.index', ['siswa_id' => $siswa->id, 'step' => 1]) }}" class="btn btn-sm btn-outline-primary">
                    <i class="fas fa-edit"></i> Edit Data Siswa
                </a>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            <h6 class="m-0 font-weight-bold">Jalur Pendaftaran</h6>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td width="30%"><strong>Jalur Pendaftaran</strong></td>
                            <td>: {{ $pendaftaran->jalur_pendaftaran }}</td>
                        </tr>
                        
                        @if($pendaftaran->jalur_pendaftaran == 'Jalur Afirmasi')
                            <tr>
                                <td><strong>Bukti Afirmasi</strong></td>
                                <td>: 
                                    @if(!empty($pendaftaran->bukti_afirmasi))
                                        <span class="text-success"><i class="fas fa-check-circle"></i> Dokumen telah diunggah</span>
                                    @else
                                        <span class="text-danger"><i class="fas fa-times-circle"></i> Belum ada dokumen</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Keterangan Afirmasi</strong></td>
                                <td>: {{ $pendaftaran->keterangan_afirmasi ?? '-' }}</td>
                            </tr>
                        
                        @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Domisili')
                            <tr>
                                <td><strong>Bukti Domisili</strong></td>
                                <td>: 
                                    @if(!empty($pendaftaran->bukti_domisili))
                                        <span class="text-success"><i class="fas fa-check-circle"></i> Dokumen telah diunggah</span>
                                    @else
                                        <span class="text-danger"><i class="fas fa-times-circle"></i> Belum ada dokumen</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Jarak ke Sekolah</strong></td>
                                <td>: {{ $pendaftaran->jarak_rumah ?? '-' }} km</td>
                            </tr>
                        
                        @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Prestasi')
                            <tr>
                                <td><strong>Jenis Prestasi</strong></td>
                                <td>: {{ $pendaftaran->jenis_prestasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tingkat Prestasi</strong></td>
                                <td>: {{ $pendaftaran->tingkat_prestasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Nama Prestasi</strong></td>
                                <td>: {{ $pendaftaran->nama_prestasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tahun Prestasi</strong></td>
                                <td>: {{ $pendaftaran->tahun_prestasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Bukti Prestasi</strong></td>
                                <td>: 
                                    @if(!empty($pendaftaran->bukti_prestasi))
                                        <span class="text-success"><i class="fas fa-check-circle"></i> Dokumen telah diunggah</span>
                                    @else
                                        <span class="text-danger"><i class="fas fa-times-circle"></i> Belum ada dokumen</span>
                                    @endif
                                </td>
                            </tr>
                        
                        @elseif($pendaftaran->jalur_pendaftaran == 'Jalur Mutasi')
                            <tr>
                                <td><strong>Asal Sekolah</strong></td>
                                <td>: {{ $pendaftaran->asal_sekolah ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Alasan Mutasi</strong></td>
                                <td>: {{ $pendaftaran->alasan_mutasi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Bukti Mutasi</strong></td>
                                <td>: 
                                    @if(!empty($pendaftaran->bukti_mutasi))
                                        <span class="text-success"><i class="fas fa-check-circle"></i> Dokumen telah diunggah</span>
                                    @else
                                        <span class="text-danger"><i class="fas fa-times-circle"></i> Belum ada dokumen</span>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.siswa.pendaftaran.index', ['siswa_id' => $siswa->id, 'step' => 2]) }}" class="btn btn-sm btn-outline-success">
                    <i class="fas fa-edit"></i> Edit Jalur Pendaftaran
                </a>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h6 class="m-0 font-weight-bold">Data Orang Tua/Wali</h6>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h6 class="border-bottom pb-2 mb-3">Data Ayah</h6>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="40%"><strong>Nama Ayah</strong></td>
                                <td>: {{ $pendaftaran->nama_ayah }}</td>
                            </tr>
                            <tr>
                                <td><strong>NIK Ayah</strong></td>
                                <td>: {{ $pendaftaran->nik_ayah }}</td>
                            </tr>
                            <tr>
                                <td><strong>No. Handphone</strong></td>
                                <td>: {{ $pendaftaran->no_hp_ayah }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="40%"><strong>Pendidikan</strong></td>
                                <td>: {{ $pendaftaran->pendidikan_ayah }}</td>
                            </tr>
                            <tr>
                                <td><strong>Pekerjaan</strong></td>
                                <td>: {{ $pendaftaran->pekerjaan_ayah }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="mb-4">
                <h6 class="border-bottom pb-2 mb-3">Data Ibu</h6>
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="40%"><strong>Nama Ibu</strong></td>
                                <td>: {{ $pendaftaran->nama_ibu }}</td>
                            </tr>
                            <tr>
                                <td><strong>NIK Ibu</strong></td>
                                <td>: {{ $pendaftaran->nik_ibu }}</td>
                            </tr>
                            <tr>
                                <td><strong>No. Handphone</strong></td>
                                <td>: {{ $pendaftaran->no_hp_ibu }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="40%"><strong>Pendidikan</strong></td>
                                <td>: {{ $pendaftaran->pendidikan_ibu }}</td>
                            </tr>
                            <tr>
                                <td><strong>Pekerjaan</strong></td>
                                <td>: {{ $pendaftaran->pekerjaan_ibu }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.siswa.pendaftaran.index', ['siswa_id' => $siswa->id, 'step' => 3]) }}" class="btn btn-sm btn-outline-info">
                    <i class="fas fa-edit"></i> Edit Data Orang Tua/Wali
                </a>
            </div>
        </div>
    </div>
    
    <div class="form-group">
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" name="konfirmasi" id="konfirmasi" value="1" required>
            <label class="form-check-label" for="konfirmasi">
                Saya menyatakan bahwa data yang diisikan dalam formulir pendaftaran ini adalah benar dan saya bersedia menerima sanksi apabila terbukti data yang saya berikan tidak benar.
            </label>
            @error('konfirmasi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    
    <div class="wizard-nav">
        <a href="{{ route('admin.siswa.pendaftaran.index', ['siswa_id' => $siswa->id, 'step' => 3]) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Sebelumnya
        </a>
        <button type="button" class="btn btn-primary" id="btnSimpan">
            <i class="fas fa-check-circle mr-1"></i> Selesaikan Pendaftaran
        </button>
    </div>
</form>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnSimpan = document.getElementById('btnSimpan');
        const formKonfirmasi = document.getElementById('formKonfirmasi');
        const checkboxKonfirmasi = document.getElementById('konfirmasi');

        btnSimpan.addEventListener('click', function() {
            if (!checkboxKonfirmasi.checked) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Peringatan',
                    text: 'Anda harus menyetujui pernyataan konfirmasi terlebih dahulu',
                    confirmButtonText: 'OK'
                });
                return;
            }

            Swal.fire({
                title: 'Konfirmasi Pendaftaran',
                text: 'Apakah Anda yakin ingin menyelesaikan pendaftaran? Data yang telah disimpan tidak dapat diubah kembali.',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Selesaikan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    formKonfirmasi.submit();
                }
            });
        });
    });
</script>
@endpush 