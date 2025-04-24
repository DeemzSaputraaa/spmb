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
        
        // Validasi step
        if ($currentStep < 1 || $currentStep > 4) {
            $currentStep = 1;
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
            'no_akta_lahir' => 'required|string|max:50',
            'agama' => 'required|string|max:20',
            'alamat_jalan' => 'required|string',
            'kelurahan' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'jalur_pendaftaran' => 'required|string|max:100',
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
        
        // Validasi berdasarkan jalur pendaftaran
        if ($jalur == 'Jalur Afirmasi') {
            $request->validate([
                'keterangan_afirmasi' => 'nullable|string',
                'bukti_afirmasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
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
                'jarak_rumah' => 'nullable|numeric',
                'bukti_domisili' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
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
                'jenis_prestasi' => 'nullable|string|max:100',
                'tingkat_prestasi' => 'nullable|string|max:100',
                'nama_prestasi' => 'nullable|string|max:255',
                'tahun_prestasi' => 'nullable|numeric|min:2000',
                'bukti_prestasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
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
                'asal_sekolah' => 'nullable|string|max:255',
                'alasan_mutasi' => 'nullable|string',
                'bukti_mutasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
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
            'nik_ayah' => 'nullable|string|max:20',
            'tahun_lahir_ayah' => 'nullable|numeric|min:1950|max:'.(date('Y')-15),
            'pendidikan_ayah' => 'nullable|string|max:50',
            'pekerjaan_ayah' => 'nullable|string|max:100',
            'penghasilan_ayah' => 'nullable|string|max:100',
            
            'nama_ibu' => 'required|string|max:100',
            'nik_ibu' => 'nullable|string|max:20',
            'tahun_lahir_ibu' => 'nullable|numeric|min:1950|max:'.(date('Y')-15),
            'pendidikan_ibu' => 'nullable|string|max:50',
            'pekerjaan_ibu' => 'nullable|string|max:100',
            'penghasilan_ibu' => 'nullable|string|max:100',
            
            'ada_wali' => 'nullable|boolean',
            'nama_wali' => 'nullable|string|max:100',
            'nik_wali' => 'nullable|string|max:20',
            'tahun_lahir_wali' => 'nullable|numeric|min:1950|max:'.(date('Y')-15),
            'pendidikan_wali' => 'nullable|string|max:50',
            'pekerjaan_wali' => 'nullable|string|max:100',
            'penghasilan_wali' => 'nullable|string|max:100',
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
        
        // Set status pendaftaran menjadi selesai
        $pendaftaran->status = 'Selesai';
        $pendaftaran->nomor_pendaftaran = 'REG-'.date('Ym').'-'.str_pad($siswa_id, 5, '0', STR_PAD_LEFT);
        $pendaftaran->tanggal_pendaftaran = now();
        $pendaftaran->save();
        
        return redirect()->route('admin.siswa.index')
            ->with('success', 'Pendaftaran siswa berhasil diselesaikan dengan Nomor Pendaftaran: '.$pendaftaran->nomor_pendaftaran);
    }
} 