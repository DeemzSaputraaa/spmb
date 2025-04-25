<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Tabulasi;
use Illuminate\Http\Request;

class TabulasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Tabulasi::query()
            ->orderBy('nilai_akhir', 'desc');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nisn', 'like', "%{$search}%")
                    ->orWhere('nama_siswa', 'like', "%{$search}%");
            });
        }

        if ($request->has('jalur')) {
            $query->where('jalur', $request->jalur);
        }

        $tabulasi = $query->paginate(10);

        return view('admin.tabulasi.index', compact('tabulasi'));
    }

    public function create()
    {
        $siswaList = \App\Models\Siswa::all();
        return view('admin.tabulasi.create', compact('siswaList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'jalur' => 'required|in:Afirmasi,Prestasi,Domisili,Mutasi',
            'jurusan' => 'required|string|max:255',
            'nilai_akhir' => 'required|numeric|min:0|max:100',
        ]);

        $siswa = \App\Models\Siswa::findOrFail($request->siswa_id);

        Tabulasi::create([
            'siswa_id' => $siswa->id,
            'nisn' => $siswa->nisn,
            'nama_siswa' => $siswa->nama_lengkap,
            'jalur' => $request->jalur,
            'jurusan' => $request->jurusan,
            'nilai_akhir' => $request->nilai_akhir,
            'mata_pelajaran' => 'Umum',
            'semester' => '1',
        ]);
        // $tabulasi = new Tabulasi();
        // $tabulasi->siswa_id = $request->siswa_id;
        // $tabulasi->nisn = $siswa->nisn;
        // $tabulasi->nama_siswa = $siswa->nama_lengkap;
        // $tabulasi->mata_pelajaran = 'Matematika'; // You might want to make this dynamic
        // $tabulasi->semester = $request->semester;
        // $tabulasi->jurusan = $request->jurusan;
        // $tabulasi->jalur = $request->jalur;
        // $tabulasi->nilai_tugas = $request->nilai_tugas;
        // $tabulasi->nilai_uts = $request->nilai_uts;
        // $tabulasi->nilai_uas = $request->nilai_uas;
        // $tabulasi->nilai_akhir = Tabulasi::calculateNilaiAkhir(
        //     $request->nilai_tugas,
        //     $request->nilai_uts,
        //     $request->nilai_uas
        // );

        // $tabulasi->save();

        return redirect()->route('admin.tabulasi.index')
            ->with('success', 'Data nilai berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tabulasi = Tabulasi::findOrFail($id);
        return view('admin.tabulasi.edit', compact('tabulasi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jalur' => 'required|in:Afirmasi,Prestasi,Domisili,Mutasi',
            'jurusan' => 'required|string|max:255',
            'nilai_akhir' => 'required|numeric|min:0|max:100',
        ]);

        $tabulasi = Tabulasi::findOrFail($id);
        $tabulasi->update([
            'jalur' => $request->jalur,
            'jurusan' => $request->jurusan,
            'nilai_akhir' => $request->nilai_akhir,
        ]);
        // $tabulasi = Tabulasi::findOrFail($id);
        // $tabulasi->semester = $request->semester;
        // $tabulasi->jurusan = $request->jurusan;
        // $tabulasi->jalur = $request->jalur;
        // $tabulasi->nilai_tugas = $request->nilai_tugas;
        // $tabulasi->nilai_uts = $request->nilai_uts;
        // $tabulasi->nilai_uas = $request->nilai_uas;
        // $tabulasi->nilai_akhir = Tabulasi::calculateNilaiAkhir(
        //     $request->nilai_tugas,
        //     $request->nilai_uts,
        //     $request->nilai_uas
        // );

        // $tabulasi->save();

        return redirect()->route('admin.tabulasi.index')
            ->with('success', 'Data nilai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $tabulasi = Tabulasi::findOrFail($id);
        $tabulasi->delete();

        return redirect()->route('admin.tabulasi.index')
            ->with('success', 'Data nilai berhasil dihapus');
    }
}
