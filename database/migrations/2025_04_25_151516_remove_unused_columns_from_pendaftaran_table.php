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
            $table->dropColumn([
                'tahun_lahir_ayah',
                'tahun_lahir_ibu',
                'penghasilan_ayah',
                'penghasilan_ibu'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->integer('tahun_lahir_ayah')->nullable()->after('nik_ayah');
            $table->string('penghasilan_ayah', 100)->nullable()->after('pekerjaan_ayah');
            $table->integer('tahun_lahir_ibu')->nullable()->after('nik_ibu');
            $table->string('penghasilan_ibu', 100)->nullable()->after('pekerjaan_ibu');
        });
    }
};
