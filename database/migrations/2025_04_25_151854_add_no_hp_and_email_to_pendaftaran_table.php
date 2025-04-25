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
            $table->string('jurusan', 100)->nullable()->after('sekolah_tujuan');
            $table->string('no_hp', 15)->nullable()->after('asal_sekolah');
            $table->string('email')->nullable()->after('no_hp');
            $table->string('no_hp_ayah', 15)->nullable()->after('pekerjaan_ayah');
            $table->string('no_hp_ibu', 15)->nullable()->after('pekerjaan_ibu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropColumn([
                'jurusan',
                'no_hp',
                'email',
                'no_hp_ayah',
                'no_hp_ibu'
            ]);
        });
    }
};
