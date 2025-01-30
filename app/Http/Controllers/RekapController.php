<?php

namespace App\Http\Controllers;

use App\Models\Rekap;
use App\Models\siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapController extends Controller
{
    public function RekapPDF(Request $request)
{
    // Ambil daftar kelas unik
    $kelasList = Siswa::select('kelas')->groupBy('kelas')->pluck('kelas');

    // Ambil kelas saat ini dari URL, jika tidak ada, ambil kelas pertama
    $currentKelas = $request->query('kelas', $kelasList->first());

    // Ambil data siswa hanya untuk kelas yang dipilih
    $data = Siswa::leftJoin('absensis', 'siswa.nisn', '=', 'absensis.nisn')
        ->select(
            'siswa.nama_siswa',
            'siswa.kelas',
            DB::raw("COUNT(CASE WHEN absensis.status = 'sakit' THEN 1 END) as sakit"),
            DB::raw("COUNT(CASE WHEN absensis.status = 'izin' THEN 1 END) as izin"),
            DB::raw("COUNT(CASE WHEN absensis.status = 'alpha' THEN 1 END) as alpha")
        )
        ->orderBy('siswa.kelas') // Filter berdasarkan kelas saat ini
        ->groupBy('siswa.nisn', 'siswa.nama_siswa', 'siswa.kelas')
        ->get();

    return view('RekapPDF', compact('data'));
}

}
