<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    /**
     * Menampilkan halaman pendaftaran dengan wizard
     */
    public function index(Request $request, $siswa_id)
    {
        $siswa = Siswa::findOrFail($siswa_id);
        $pendaftaran = Pendaftaran::where('siswa_id', $siswa_id)->first();
        $currentStep = $request->query('step', 1);
        
        // Jika belum ada data pendaftaran, buat baru
        if (!$pendaftaran) {
            $pendaftaran = new Pendaftaran();
            $pendaftaran->siswa_id = $siswa_id;
            $pendaftaran->nisn = $siswa->nisn;
            $pendaftaran->nik = $siswa->nik;
            $pendaftaran->save();
        }
        
        // Jika pendaftaran sudah selesai, langsung arahkan ke step 4
        if ($pendaftaran->status == 'Selesai') {
            $currentStep = 4;
        } else {
            // Validasi step
            if ($currentStep < 1 || $currentStep > 4) {
                $currentStep = 1;
            }
        }
        
        return view('admin.siswa.pendaftaran.index', [
            'siswa' => $siswa,
            'pendaftaran' => $pendaftaran,
            'currentStep' => $currentStep
        ]);
    }
    
    /**
     * Proses step 1: Data Siswa
     */
    public function storeStep1(Request $request, $siswa_id)
    {
        $request->validate([
            'nisn' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'usia' => 'required|integer',
            'no_akta_lahir' => 'required|string|max:50',
            'agama' => 'required|string|max:20',
            'alamat_jalan' => 'required|string',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'sekolah_tujuan' => 'required|string|max:255',
            'jurusan' => 'required|string|max:100',
            'asal_sekolah' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'jalur_pendaftaran' => 'required|string|max:100',
        ], [
            'required' => 'Field :attribute wajib diisi',
            'email' => 'Format email tidak valid',
            'max' => 'Field :attribute tidak boleh lebih dari :max karakter',
            'date' => 'Format tanggal tidak valid',
            'integer' => 'Field :attribute harus berupa angka',
        ]);
        
        $siswa = Siswa::findOrFail($siswa_id);
        $pendaftaran = Pendaftaran::where('siswa_id', $siswa_id)->first();
        
        if (!$pendaftaran) {
            $pendaftaran = new Pendaftaran();
            $pendaftaran->siswa_id = $siswa_id;
        }
        
        // Update data dari form
        $pendaftaran->fill($request->all());
        $pendaftaran->save();
        
        // Update data siswa juga
        $siswa->nisn = $request->nisn;
        $siswa->nik = $request->nik;
        $siswa->save();
        
        return redirect()->route('admin.siswa.pendaftaran.index', [
            'siswa_id' => $siswa_id,
            'step' => 2
        ])->with('success', 'Data siswa berhasil disimpan');
    }
    
    /**
     * Proses step 2: Jalur Pendaftaran
     */
    public function storeStep2(Request $request, $siswa_id)
    {
        $pendaftaran = Pendaftaran::where('siswa_id', $siswa_id)->firstOrFail();
        $jalur = $pendaftaran->jalur_pendaftaran;
        
        // Validasi berkas umum yang wajib diupload
        $request->validate([
            'foto' => 'required_without:foto_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ijazah' => 'required_without:ijazah_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'akte_kelahiran' => 'required_without:akte_kelahiran_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'kartu_keluarga' => 'required_without:kartu_keluarga_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'ktp_ortu' => 'required_without:ktp_ortu_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'nilai' => 'required|numeric|min:0|max:100',
        ], [
            'required_without' => 'File :attribute wajib diunggah',
            'file' => 'Upload harus berupa file',
            'mimes' => 'Format file harus pdf, jpg, jpeg, atau png',
            'max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'nilai.required' => 'Nilai wajib diisi',
            'nilai.numeric' => 'Nilai harus berupa angka',
            'nilai.min' => 'Nilai minimal 0',
            'nilai.max' => 'Nilai maksimal 100',
        ]);

        // Handle upload berkas umum
        if ($request->hasFile('foto')) {
            if ($pendaftaran->foto) {
                Storage::delete('public/pendaftaran/'.$pendaftaran->foto);
            }
            $file = $request->file('foto');
            $filename = 'foto_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/pendaftaran', $filename);
            $pendaftaran->foto = $filename;
        }
        
        if ($request->hasFile('ijazah')) {
            if ($pendaftaran->ijazah) {
                Storage::delete('public/pendaftaran/'.$pendaftaran->ijazah);
            }
            $file = $request->file('ijazah');
            $filename = 'ijazah_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/pendaftaran', $filename);
            $pendaftaran->ijazah = $filename;
        }
        
        if ($request->hasFile('akte_kelahiran')) {
            if ($pendaftaran->akte_kelahiran) {
                Storage::delete('public/pendaftaran/'.$pendaftaran->akte_kelahiran);
            }
            $file = $request->file('akte_kelahiran');
            $filename = 'akte_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/pendaftaran', $filename);
            $pendaftaran->akte_kelahiran = $filename;
        }
        
        if ($request->hasFile('kartu_keluarga')) {
            if ($pendaftaran->kartu_keluarga) {
                Storage::delete('public/pendaftaran/'.$pendaftaran->kartu_keluarga);
            }
            $file = $request->file('kartu_keluarga');
            $filename = 'kk_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/pendaftaran', $filename);
            $pendaftaran->kartu_keluarga = $filename;
        }
        
        if ($request->hasFile('ktp_ortu')) {
            if ($pendaftaran->ktp_ortu) {
                Storage::delete('public/pendaftaran/'.$pendaftaran->ktp_ortu);
            }
            $file = $request->file('ktp_ortu');
            $filename = 'ktp_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
            $file->storeAs('public/pendaftaran', $filename);
            $pendaftaran->ktp_ortu = $filename;
        }
        
        // Simpan nilai siswa
        $pendaftaran->nilai = $request->nilai;
        
        // Validasi berdasarkan jalur pendaftaran
        if ($jalur == 'Jalur Afirmasi') {
            $request->validate([
                'keterangan_afirmasi' => 'required|string',
                'bukti_afirmasi' => 'required_without:bukti_afirmasi_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ], [
                'required' => 'Field :attribute wajib diisi',
                'required_without' => 'File :attribute wajib diunggah',
                'file' => 'Upload harus berupa file',
                'mimes' => 'Format file harus pdf, jpg, jpeg, atau png',
                'max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);
            
            if ($request->hasFile('bukti_afirmasi')) {
                if ($pendaftaran->bukti_afirmasi) {
                    Storage::delete('public/pendaftaran/'.$pendaftaran->bukti_afirmasi);
                }
                
                $file = $request->file('bukti_afirmasi');
                $filename = 'afirmasi_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/pendaftaran', $filename);
                $pendaftaran->bukti_afirmasi = $filename;
            }
            
            $pendaftaran->keterangan_afirmasi = $request->keterangan_afirmasi;
        } 
        elseif ($jalur == 'Jalur Domisili') {
            $request->validate([
                'jarak_rumah' => 'required|numeric',
                'bukti_domisili' => 'required_without:bukti_domisili_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ], [
                'required' => 'Field :attribute wajib diisi',
                'numeric' => 'Field :attribute harus berupa angka',
                'required_without' => 'File :attribute wajib diunggah',
                'file' => 'Upload harus berupa file',
                'mimes' => 'Format file harus pdf, jpg, jpeg, atau png',
                'max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);
            
            if ($request->hasFile('bukti_domisili')) {
                if ($pendaftaran->bukti_domisili) {
                    Storage::delete('public/pendaftaran/'.$pendaftaran->bukti_domisili);
                }
                
                $file = $request->file('bukti_domisili');
                $filename = 'domisili_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/pendaftaran', $filename);
                $pendaftaran->bukti_domisili = $filename;
            }
            
            $pendaftaran->jarak_rumah = $request->jarak_rumah;
        } 
        elseif ($jalur == 'Jalur Prestasi') {
            $request->validate([
                'jenis_prestasi' => 'required|string|max:100',
                'tingkat_prestasi' => 'required|string|max:100',
                'nama_prestasi' => 'required|string|max:255',
                'tahun_prestasi' => 'required|numeric|min:2000',
                'bukti_prestasi' => 'required_without:bukti_prestasi_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ], [
                'required' => 'Field :attribute wajib diisi',
                'string' => 'Field :attribute harus berupa teks',
                'max' => 'Field :attribute tidak boleh lebih dari :max karakter',
                'numeric' => 'Field :attribute harus berupa angka',
                'min' => 'Tahun prestasi minimal tahun 2000',
                'required_without' => 'File :attribute wajib diunggah',
                'file' => 'Upload harus berupa file',
                'mimes' => 'Format file harus pdf, jpg, jpeg, atau png',
                'max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);
            
            if ($request->hasFile('bukti_prestasi')) {
                if ($pendaftaran->bukti_prestasi) {
                    Storage::delete('public/pendaftaran/'.$pendaftaran->bukti_prestasi);
                }
                
                $file = $request->file('bukti_prestasi');
                $filename = 'prestasi_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/pendaftaran', $filename);
                $pendaftaran->bukti_prestasi = $filename;
            }
            
            $pendaftaran->jenis_prestasi = $request->jenis_prestasi;
            $pendaftaran->tingkat_prestasi = $request->tingkat_prestasi;
            $pendaftaran->nama_prestasi = $request->nama_prestasi;
            $pendaftaran->tahun_prestasi = $request->tahun_prestasi;
        } 
        elseif ($jalur == 'Jalur Mutasi') {
            $request->validate([
                'asal_sekolah' => 'required|string|max:255',
                'alasan_mutasi' => 'required|string',
                'bukti_mutasi' => 'required_without:bukti_mutasi_exists|file|mimes:pdf,jpg,jpeg,png|max:2048',
            ], [
                'required' => 'Field :attribute wajib diisi',
                'string' => 'Field :attribute harus berupa teks',
                'max' => 'Field :attribute tidak boleh lebih dari :max karakter',
                'required_without' => 'File :attribute wajib diunggah',
                'file' => 'Upload harus berupa file',
                'mimes' => 'Format file harus pdf, jpg, jpeg, atau png',
                'max' => 'Ukuran file tidak boleh lebih dari 2MB',
            ]);
            
            if ($request->hasFile('bukti_mutasi')) {
                if ($pendaftaran->bukti_mutasi) {
                    Storage::delete('public/pendaftaran/'.$pendaftaran->bukti_mutasi);
                }
                
                $file = $request->file('bukti_mutasi');
                $filename = 'mutasi_'.$siswa_id.'_'.time().'.'.$file->getClientOriginalExtension();
                $file->storeAs('public/pendaftaran', $filename);
                $pendaftaran->bukti_mutasi = $filename;
            }
            
            $pendaftaran->asal_sekolah = $request->asal_sekolah;
            $pendaftaran->alasan_mutasi = $request->alasan_mutasi;
        }
        
        $pendaftaran->save();
        
        return redirect()->route('admin.siswa.pendaftaran.index', [
            'siswa_id' => $siswa_id,
            'step' => 3
        ])->with('success', 'Data jalur pendaftaran berhasil disimpan');
    }
    
    /**
     * Proses step 3: Data Orang Tua/Wali
     */
    public function storeStep3(Request $request, $siswa_id)
    {
        $request->validate([
            'nama_ayah' => 'required|string|max:100',
            'nik_ayah' => 'required|string|max:20',
            'pendidikan_ayah' => 'required|string|max:50',
            'pekerjaan_ayah' => 'required|string|max:100',
            'no_hp_ayah' => 'required|string|max:15',
            
            'nama_ibu' => 'required|string|max:100',
            'nik_ibu' => 'required|string|max:20',
            'pendidikan_ibu' => 'required|string|max:50',
            'pekerjaan_ibu' => 'required|string|max:100',
            'no_hp_ibu' => 'required|string|max:15',
            
            'ada_wali' => 'nullable|boolean',
            'nama_wali' => 'required_if:ada_wali,1|nullable|string|max:100',
            'nik_wali' => 'required_if:ada_wali,1|nullable|string|max:20',
            'tahun_lahir_wali' => 'required_if:ada_wali,1|nullable|numeric|min:1950|max:'.(date('Y')-15),
            'pendidikan_wali' => 'required_if:ada_wali,1|nullable|string|max:50',
            'pekerjaan_wali' => 'required_if:ada_wali,1|nullable|string|max:100',
            'penghasilan_wali' => 'required_if:ada_wali,1|nullable|string|max:100',
        ], [
            'required' => 'Field :attribute wajib diisi',
            'required_if' => 'Field :attribute wajib diisi jika ada wali',
            'string' => 'Field :attribute harus berupa teks',
            'max' => 'Field :attribute tidak boleh lebih dari :max karakter',
            'numeric' => 'Field :attribute harus berupa angka',
            'min' => 'Tahun lahir minimal 1950',
        ]);
        
        $pendaftaran = Pendaftaran::where('siswa_id', $siswa_id)->firstOrFail();
        
        // Update data dari form
        $pendaftaran->fill($request->all());
        $pendaftaran->ada_wali = $request->has('ada_wali') ? 1 : 0;
        $pendaftaran->save();
        
        return redirect()->route('admin.siswa.pendaftaran.index', [
            'siswa_id' => $siswa_id,
            'step' => 4
        ])->with('success', 'Data orang tua/wali berhasil disimpan');
    }
    
    /**
     * Proses step 4: Konfirmasi dan Selesai
     */
    public function storeStep4(Request $request, $siswa_id)
    {
        $request->validate([
            'konfirmasi' => 'required|accepted',
        ]);
        
        $pendaftaran = Pendaftaran::where('siswa_id', $siswa_id)->firstOrFail();
        $siswa = Siswa::findOrFail($siswa_id);
        
        // Set status pendaftaran menjadi selesai
        $pendaftaran->status = 'Selesai';
        $pendaftaran->nomor_pendaftaran = 'REG-'.date('Ym').'-'.str_pad($siswa_id, 5, '0', STR_PAD_LEFT);
        $pendaftaran->tanggal_pendaftaran = now();
        $pendaftaran->save();
        
        return redirect()->route('admin.siswa.index')
            ->with('success', '<strong>Pendaftaran Berhasil!</strong> Data pendaftaran siswa <strong>'.$siswa->nama_lengkap.'</strong> telah disimpan dengan Nomor Pendaftaran: <strong>'.$pendaftaran->nomor_pendaftaran.'</strong>');
    }
} 