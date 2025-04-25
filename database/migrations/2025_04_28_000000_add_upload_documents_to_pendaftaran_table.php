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
        Schema::table('pendaftaran', function (Blueprint $table) {
            // Dokumen Umum
            $table->string('foto')->nullable()->after('jalur_pendaftaran');
            $table->string('ijazah')->nullable()->after('foto');
            $table->string('akte_kelahiran')->nullable()->after('ijazah');
            $table->string('kartu_keluarga')->nullable()->after('akte_kelahiran');
            $table->string('ktp_ortu')->nullable()->after('kartu_keluarga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropColumn([
                'foto',
                'ijazah',
                'akte_kelahiran',
                'kartu_keluarga',
                'ktp_ortu'
            ]);
        });
    }
}; 