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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id(); // Kolom id sebagai primary key
            $table->string('NISN'); // Kolom NISN sebagai foreign key
            $table->enum('status', ['Sakit', 'Izin', 'Alpa'])->default('Alpa'); // Status ketidakhadiran
            $table->text('alasan'); // Kolom alasan ketidakhadiran
            $table->date('tanggal'); // Kolom tanggal absensi
            $table->timestamps(); // timestamps untuk created_at dan updated_at

            // Menambahkan foreign key constraint
            $table->foreign('NISN')->references('NISN')->on('siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
