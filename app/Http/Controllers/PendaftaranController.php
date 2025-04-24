<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Menyimpan data pendaftaran sebagai draft
     */
    public function saveDraft(Request $request, $siswa_id)
    {
        try {
            $siswa = Siswa::findOrFail($siswa_id);
            $formData = json_decode($request->form_data, true);
            
            // Ambil atau buat pendaftaran baru
            $pendaftaran = Pendaftaran::firstOrNew(['siswa_id' => $siswa_id]);
            
            // Update data sesuai dengan step yang sedang aktif
            switch($request->current_step) {
                case 1:
                    $pendaftaran->fill([
                        'nisn' => $formData['nisn'] ?? null,
                        'nik' => $formData['nik'] ?? null,
                        'tempat_lahir' => $formData['tempat_lahir'] ?? null,
                        'tanggal_lahir' => $formData['tanggal_lahir'] ?? null,
                        'no_akta_lahir' => $formData['no_akta_lahir'] ?? null,
                        'agama' => $formData['agama'] ?? null,
                        'alamat_jalan' => $formData['alamat_jalan'] ?? null,
                        'kelurahan' => $formData['kelurahan'] ?? null,
                        'kecamatan' => $formData['kecamatan'] ?? null,
                        'kabupaten' => $formData['kabupaten'] ?? null,
                        'provinsi' => $formData['provinsi'] ?? null,
                    ]);
                    break;
                    
                case 2:
                    $pendaftaran->fill([
                        'jalur_pendaftaran' => $formData['jalur_pendaftaran'] ?? null,
                        'bukti_afirmasi' => $formData['bukti_afirmasi'] ?? null,
                        'keterangan_afirmasi' => $formData['keterangan_afirmasi'] ?? null,
                        'bukti_domisili' => $formData['bukti_domisili'] ?? null,
                        'jarak_rumah' => $formData['jarak_rumah'] ?? null,
                        'jenis_prestasi' => $formData['jenis_prestasi'] ?? null,
                        'tingkat_prestasi' => $formData['tingkat_prestasi'] ?? null,
                        'nama_prestasi' => $formData['nama_prestasi'] ?? null,
                        'tahun_prestasi' => $formData['tahun_prestasi'] ?? null,
                        'bukti_prestasi' => $formData['bukti_prestasi'] ?? null,
                        'asal_sekolah' => $formData['asal_sekolah'] ?? null,
                        'alasan_mutasi' => $formData['alasan_mutasi'] ?? null,
                        'bukti_mutasi' => $formData['bukti_mutasi'] ?? null,
                    ]);
                    break;
                    
                case 3:
                    $pendaftaran->fill([
                        'nama_ayah' => $formData['nama_ayah'] ?? null,
                        'nik_ayah' => $formData['nik_ayah'] ?? null,
                        'tahun_lahir_ayah' => $formData['tahun_lahir_ayah'] ?? null,
                        'pendidikan_ayah' => $formData['pendidikan_ayah'] ?? null,
                        'pekerjaan_ayah' => $formData['pekerjaan_ayah'] ?? null,
                        'penghasilan_ayah' => $formData['penghasilan_ayah'] ?? null,
                        'nama_ibu' => $formData['nama_ibu'] ?? null,
                        'nik_ibu' => $formData['nik_ibu'] ?? null,
                        'tahun_lahir_ibu' => $formData['tahun_lahir_ibu'] ?? null,
                        'pendidikan_ibu' => $formData['pendidikan_ibu'] ?? null,
                        'pekerjaan_ibu' => $formData['pekerjaan_ibu'] ?? null,
                        'penghasilan_ibu' => $formData['penghasilan_ibu'] ?? null,
                        'ada_wali' => $formData['ada_wali'] ?? false,
                        'nama_wali' => $formData['nama_wali'] ?? null,
                        'nik_wali' => $formData['nik_wali'] ?? null,
                        'tahun_lahir_wali' => $formData['tahun_lahir_wali'] ?? null,
                        'pendidikan_wali' => $formData['pendidikan_wali'] ?? null,
                        'pekerjaan_wali' => $formData['pekerjaan_wali'] ?? null,
                        'penghasilan_wali' => $formData['penghasilan_wali'] ?? null,
                    ]);
                    break;
            }
            
            // Set status sebagai draft
            $pendaftaran->status = 'Draft';
            
            // Simpan pendaftaran
            $pendaftaran->save();
            
            return redirect()
                ->route('admin.siswa.index')
                ->with('success', 'Data pendaftaran berhasil disimpan sebagai draft');
            
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }
} 