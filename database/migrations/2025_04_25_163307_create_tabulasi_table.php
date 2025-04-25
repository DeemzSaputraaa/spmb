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
        Schema::create('tabulasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->string('nisn');
            $table->string('nama_siswa');
            $table->enum('jalur', ['Afirmasi', 'Prestasi', 'Domisili', 'Mutasi']);
            $table->string('jurusan');
            $table->decimal('nilai_akhir', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabulasi');
    }
};
