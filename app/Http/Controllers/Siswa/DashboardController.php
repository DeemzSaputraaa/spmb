<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard siswa
     */
    public function index()
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        // Cek apakah user memiliki role siswa
        if (!auth()->user()->isSiswa()) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        // Ambil data siswa berdasarkan email user yang login
        $siswa = Siswa::where('email', auth()->user()->email)->first();
        
        // Ambil data pendaftaran jika ada
        $pendaftaran = null;
        if ($siswa) {
            $pendaftaran = Pendaftaran::where('siswa_id', $siswa->id)->first();
        }
        
        return view('siswa.dashboard', compact('siswa', 'pendaftaran'));
    }
}
