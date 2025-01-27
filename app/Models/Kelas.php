<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'siswa';

    // Menentukan primary key
    protected $primaryKey = 'nisn';

    // Menentukan apakah primary key bersifat auto-increment
    public $incrementing = false;

    // Menentukan tipe data primary key
    protected $keyType = 'string';

    // Menentukan kolom-kolom yang bisa diisi mass assignment
    protected $fillable = [
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
        'kelas',
    ];

    // Menentukan kolom-kolom yang tidak bisa diisi mass assignment
    // protected $guarded = ['NISN']; // jika kamu ingin menggunakan guarded

    // Menentukan apakah timestamp digunakan
    public $timestamps = true;

    public function absensi()
    {
        return $this->hasMany(absensi::class, 'nisn', 'nisn');
    }
    
    public function getSakitCountAttribute()
    {
        return Absensi::where('nisn', $this->nisn)
            ->where('status', 'sakit')
            ->count();
    }

    public function getIzinCountAttribute()
    {
        return Absensi::where('nisn', $this->nisn)
            ->where('status', 'izin')
            ->count();
    }

    public function getAlphaCountAttribute()
    {
        return Absensi::where('nisn', $this->nisn)
            ->where('status', 'alpha')
            ->count();
    }
}
