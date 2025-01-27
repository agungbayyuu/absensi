<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang digunakan
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
        return $this->hasMany(absensi::class);
    }

}
