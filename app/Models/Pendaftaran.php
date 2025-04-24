<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    
    /**
     * Nama tabel yang terkait dengan model ini
     *
     * @var string
     */
    protected $table = 'pendaftaran';
    
    /**
     * Atribut yang dapat diisi secara massal
     *
     * @var array
     */
    protected $fillable = [
        'siswa_id',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'no_akta_lahir',
        'agama',
        'alamat_jalan',
        'kelurahan',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'jalur_pendaftaran',
        
        // Dokumen Umum
        'foto',
        'ijazah',
        'akte_kelahiran',
        'kartu_keluarga',
        'ktp_ortu',
        
        // Jalur Afirmasi
        'bukti_afirmasi',
        'keterangan_afirmasi',
        
        // Jalur Domisili
        'bukti_domisili',
        'jarak_rumah',
        
        // Jalur Prestasi
        'jenis_prestasi',
        'tingkat_prestasi',
        'nama_prestasi',
        'tahun_prestasi',
        'bukti_prestasi',
        
        // Jalur Mutasi
        'asal_sekolah',
        'alasan_mutasi',
        'bukti_mutasi',
        
        // Data Ayah
        'nama_ayah',
        'nik_ayah',
        'tahun_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        
        // Data Ibu
        'nama_ibu',
        'nik_ibu',
        'tahun_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        
        // Data Wali
        'ada_wali',
        'nama_wali',
        'nik_wali',
        'tahun_lahir_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
        
        // Data Pendaftaran
        'status',
        'nomor_pendaftaran',
        'tanggal_pendaftaran',
    ];
    
    /**
     * Atribut yang harus dikonversi ke tipe data tertentu
     *
     * @var array
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'tanggal_pendaftaran' => 'datetime',
        'ada_wali' => 'boolean',
    ];
    
    /**
     * Relasi ke model Siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
} 