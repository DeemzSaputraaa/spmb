<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            
            // Data Siswa
            $table->string('nisn', 20)->nullable();
            $table->string('nik', 20)->nullable();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_akta_lahir', 50)->nullable();
            $table->string('agama', 20)->nullable();
            $table->text('alamat_jalan')->nullable();
            $table->string('kelurahan', 100)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->string('kabupaten', 100)->nullable();
            $table->string('provinsi', 100)->nullable();
            $table->string('jalur_pendaftaran', 100)->nullable();
            
            // Jalur Afirmasi
            $table->string('bukti_afirmasi')->nullable();
            $table->text('keterangan_afirmasi')->nullable();
            
            // Jalur Domisili
            $table->string('bukti_domisili')->nullable();
            $table->float('jarak_rumah')->nullable();
            
            // Jalur Prestasi
            $table->string('jenis_prestasi', 100)->nullable();
            $table->string('tingkat_prestasi', 100)->nullable();
            $table->string('nama_prestasi')->nullable();
            $table->integer('tahun_prestasi')->nullable();
            $table->string('bukti_prestasi')->nullable();
            
            // Jalur Mutasi
            $table->string('asal_sekolah')->nullable();
            $table->text('alasan_mutasi')->nullable();
            $table->string('bukti_mutasi')->nullable();
            
            // Data Ayah
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nik_ayah', 20)->nullable();
            $table->integer('tahun_lahir_ayah')->nullable();
            $table->string('pendidikan_ayah', 50)->nullable();
            $table->string('pekerjaan_ayah', 100)->nullable();
            $table->string('penghasilan_ayah', 100)->nullable();
            
            // Data Ibu
            $table->string('nama_ibu', 100)->nullable();
            $table->string('nik_ibu', 20)->nullable();
            $table->integer('tahun_lahir_ibu')->nullable();
            $table->string('pendidikan_ibu', 50)->nullable();
            $table->string('pekerjaan_ibu', 100)->nullable();
            $table->string('penghasilan_ibu', 100)->nullable();
            
            // Data Wali
            $table->boolean('ada_wali')->default(false);
            $table->string('nama_wali', 100)->nullable();
            $table->string('nik_wali', 20)->nullable();
            $table->integer('tahun_lahir_wali')->nullable();
            $table->string('pendidikan_wali', 50)->nullable();
            $table->string('pekerjaan_wali', 100)->nullable();
            $table->string('penghasilan_wali', 100)->nullable();
            
            // Data Pendaftaran
            $table->string('status')->default('Draft');
            $table->string('nomor_pendaftaran')->nullable();
            $table->timestamp('tanggal_pendaftaran')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
}; 