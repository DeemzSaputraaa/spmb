<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    /**
     * Nama tabel yang terkait dengan model
     */
    protected $table = 'siswas';
    
    protected $fillable = [
        'nisn',
        'nik',
        'nama_lengkap',
        'email',
        'nomor_hp',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    public function detailSiswa()
    {
        return $this->hasOne(DetailSiswa::class);
    }
}
