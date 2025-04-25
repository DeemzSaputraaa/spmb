<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tabulasi extends Model
{
    use HasFactory;

    protected $table = 'tabulasi';
    protected $fillable = [
        'siswa_id',
        'nisn',
        'nama_siswa',
        'jalur',
        'jurusan',
        'nilai_akhir'
    ];

    public function siswa()
    {
        return $this->belongsTo(\App\Models\Siswa::class, 'siswa_id');
    }

    // Calculate final score (30% tugas + 30% uts + 40% uas)
    // public static function calculateNilaiAkhir($tugas, $uts, $uas)
    // {
    //     return ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
    // }
}
