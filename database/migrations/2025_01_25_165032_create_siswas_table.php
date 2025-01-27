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
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn')->primary(); // NISN sebagai primary key
            $table->string('nama_siswa'); // nama siswa
            $table->enum('jenis_kelamin', ['L', 'P']); // jenis kelamin (L = Laki-laki, P = Perempuan)
            $table->string('kelas'); // kelas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
