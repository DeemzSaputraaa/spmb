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
        $siswaList = Siswa::all();
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

        $siswa = Siswa::findOrFail($request->siswa_id);

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
    
    public function exportExcel()
    {
        // Jalur yang akan diexport
        $jalurList = ['Afirmasi', 'Prestasi', 'Domisili', 'Mutasi'];
        
        // Header untuk excel
        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="tabulasi_nilai_' . date('Y-m-d_H-i-s') . '.xls"',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ];
        
        // Membuat template HTML untuk Excel dengan layout horizontal
        $html = '
        <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="ProgId" content="Excel.Sheet">
                <meta name="Generator" content="Microsoft Excel 11">
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    th, td {
                        border: 1px solid #000000;
                        padding: 5px;
                        text-align: left;
                        vertical-align: top;
                    }
                    th {
                        background-color: #f2f2f2;
                        font-weight: bold;
                    }
                    .sheet-title {
                        font-size: 16pt;
                        font-weight: bold;
                        margin-bottom: 10px;
                        color: #0000FF;
                    }
                    .jalur-title {
                        font-size: 12pt;
                        font-weight: bold;
                        color: #0000FF;
                        text-align: center;
                        background-color: #E6F2FF;
                    }
                    .empty-cell {
                        border: none;
                        width: 20px;
                    }
                </style>
            </head>
            <body>';
        
        // Mendapatkan data untuk semua jalur
        $allData = Tabulasi::orderBy('nilai_akhir', 'desc')->get();
        
        // Mendapatkan data untuk setiap jalur
        $dataPerJalur = [];
        foreach ($jalurList as $jalur) {
            $dataPerJalur[$jalur] = Tabulasi::where('jalur', $jalur)
                ->orderBy('nilai_akhir', 'desc')
                ->get();
        }
        
        // Maksimum jumlah data untuk setiap jalur
        $maxCount = max(
            count($allData),
            count($dataPerJalur['Afirmasi']),
            count($dataPerJalur['Prestasi']),
            count($dataPerJalur['Domisili']),
            count($dataPerJalur['Mutasi'])
        );
        
        // Membuat tabel layout horizontal
        $html .= '<table cellspacing="0" cellpadding="0">';
        
        // Baris untuk judul jalur
        $html .= '<tr>';
        $html .= '<td class="jalur-title" colspan="6">SEMUA JALUR</td>';
        $html .= '<td class="empty-cell"></td>';
        $html .= '<td class="jalur-title" colspan="5">JALUR AFIRMASI</td>';
        $html .= '<td class="empty-cell"></td>';
        $html .= '<td class="jalur-title" colspan="5">JALUR PRESTASI</td>';
        $html .= '<td class="empty-cell"></td>';
        $html .= '<td class="jalur-title" colspan="5">JALUR DOMISILI</td>';
        $html .= '<td class="empty-cell"></td>';
        $html .= '<td class="jalur-title" colspan="5">JALUR MUTASI</td>';
        $html .= '</tr>';
        
        // Baris untuk header kolom
        $html .= '<tr>';
        // Header untuk semua jalur
        $html .= '<th>No</th><th>NISN</th><th>Nama Siswa</th><th>Jalur</th><th>Jurusan</th><th>Nilai</th>';
        $html .= '<td class="empty-cell"></td>';
        
        // Header untuk Jalur Afirmasi
        $html .= '<th>No</th><th>NISN</th><th>Nama Siswa</th><th>Jurusan</th><th>Nilai</th>';
        $html .= '<td class="empty-cell"></td>';
        
        // Header untuk Jalur Prestasi
        $html .= '<th>No</th><th>NISN</th><th>Nama Siswa</th><th>Jurusan</th><th>Nilai</th>';
        $html .= '<td class="empty-cell"></td>';
        
        // Header untuk Jalur Domisili
        $html .= '<th>No</th><th>NISN</th><th>Nama Siswa</th><th>Jurusan</th><th>Nilai</th>';
        $html .= '<td class="empty-cell"></td>';
        
        // Header untuk Jalur Mutasi
        $html .= '<th>No</th><th>NISN</th><th>Nama Siswa</th><th>Jurusan</th><th>Nilai</th>';
        $html .= '</tr>';
        
        // Baris untuk data
        for ($i = 0; $i < $maxCount; $i++) {
            $html .= '<tr>';
            
            // Data untuk semua jalur
            if ($i < count($allData)) {
                $row = $allData[$i];
                $html .= '<td>' . ($i + 1) . '</td>';
                $html .= '<td>' . $row->nisn . '</td>';
                $html .= '<td>' . $row->nama_siswa . '</td>';
                $html .= '<td>' . $row->jalur . '</td>';
                $html .= '<td>' . $row->jurusan . '</td>';
                $html .= '<td>' . number_format($row->nilai_akhir, 2) . '</td>';
            } else {
                $html .= '<td colspan="6"></td>';
            }
            
            $html .= '<td class="empty-cell"></td>';
            
            // Data untuk Jalur Afirmasi
            if ($i < count($dataPerJalur['Afirmasi'])) {
                $row = $dataPerJalur['Afirmasi'][$i];
                $html .= '<td>' . ($i + 1) . '</td>';
                $html .= '<td>' . $row->nisn . '</td>';
                $html .= '<td>' . $row->nama_siswa . '</td>';
                $html .= '<td>' . $row->jurusan . '</td>';
                $html .= '<td>' . number_format($row->nilai_akhir, 2) . '</td>';
            } else {
                $html .= '<td colspan="5"></td>';
            }
            
            $html .= '<td class="empty-cell"></td>';
            
            // Data untuk Jalur Prestasi
            if ($i < count($dataPerJalur['Prestasi'])) {
                $row = $dataPerJalur['Prestasi'][$i];
                $html .= '<td>' . ($i + 1) . '</td>';
                $html .= '<td>' . $row->nisn . '</td>';
                $html .= '<td>' . $row->nama_siswa . '</td>';
                $html .= '<td>' . $row->jurusan . '</td>';
                $html .= '<td>' . number_format($row->nilai_akhir, 2) . '</td>';
            } else {
                $html .= '<td colspan="5"></td>';
            }
            
            $html .= '<td class="empty-cell"></td>';
            
            // Data untuk Jalur Domisili
            if ($i < count($dataPerJalur['Domisili'])) {
                $row = $dataPerJalur['Domisili'][$i];
                $html .= '<td>' . ($i + 1) . '</td>';
                $html .= '<td>' . $row->nisn . '</td>';
                $html .= '<td>' . $row->nama_siswa . '</td>';
                $html .= '<td>' . $row->jurusan . '</td>';
                $html .= '<td>' . number_format($row->nilai_akhir, 2) . '</td>';
            } else {
                $html .= '<td colspan="5"></td>';
            }
            
            $html .= '<td class="empty-cell"></td>';
            
            // Data untuk Jalur Mutasi
            if ($i < count($dataPerJalur['Mutasi'])) {
                $row = $dataPerJalur['Mutasi'][$i];
                $html .= '<td>' . ($i + 1) . '</td>';
                $html .= '<td>' . $row->nisn . '</td>';
                $html .= '<td>' . $row->nama_siswa . '</td>';
                $html .= '<td>' . $row->jurusan . '</td>';
                $html .= '<td>' . number_format($row->nilai_akhir, 2) . '</td>';
            } else {
                $html .= '<td colspan="5"></td>';
            }
            
            $html .= '</tr>';
        }
        
        $html .= '</table>';
        $html .= '</body></html>';
        
        return response($html, 200, $headers);
    }

    public function exportCsv()
    {
        // Jalur yang akan diexport
        $jalurList = ['Afirmasi', 'Prestasi', 'Domisili', 'Mutasi'];
        
        // Membuat file CSV
        $filename = 'tabulasi_nilai_' . date('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];
        
        $callback = function() use ($jalurList) {
            $file = fopen('php://output', 'w');
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF)); // BOM untuk UTF-8
            
            // Header untuk semua data
            fputcsv($file, ['DATA TABULASI SEMUA JALUR']);
            fputcsv($file, ['No', 'NISN', 'Nama Siswa', 'Jalur', 'Jurusan', 'Nilai Akhir']);
            
            // Data untuk semua jalur
            $allData = Tabulasi::orderBy('jalur')->orderBy('nilai_akhir', 'desc')->get();
            $no = 1;
            
            foreach ($allData as $row) {
                fputcsv($file, [
                    $no++,
                    $row->nisn,
                    $row->nama_siswa,
                    $row->jalur,
                    $row->jurusan,
                    number_format($row->nilai_akhir, 2)
                ]);
            }
            
            // Membuat baris kosong sebagai separator
            fputcsv($file, []);
            fputcsv($file, []);
            
            // Loop untuk setiap jalur
            foreach ($jalurList as $jalur) {
                fputcsv($file, ["DATA TABULASI JALUR: $jalur"]);
                fputcsv($file, ['No', 'NISN', 'Nama Siswa', 'Jurusan', 'Nilai Akhir']);
                
                $jalurData = Tabulasi::where('jalur', $jalur)
                    ->orderBy('nilai_akhir', 'desc')
                    ->get();
                
                if ($jalurData->count() > 0) {
                    $no = 1;
                    foreach ($jalurData as $row) {
                        fputcsv($file, [
                            $no++,
                            $row->nisn,
                            $row->nama_siswa,
                            $row->jurusan,
                            number_format($row->nilai_akhir, 2)
                        ]);
                    }
                } else {
                    fputcsv($file, ['Tidak ada data untuk jalur ini']);
                }
                
                // Membuat baris kosong sebagai separator
                fputcsv($file, []);
                fputcsv($file, []);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
