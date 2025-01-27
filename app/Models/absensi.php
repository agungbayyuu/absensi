<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'absensis';

    // Menentukan kolom-kolom yang bisa diisi mass assignment
    protected $fillable = [
        'nisn',
        'status',
        'tanggal', // Menambahkan tanggal
    ];

    // Relasi dengan model Siswa (one-to-many)
    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'nisn', 'nisn');
    }
}
