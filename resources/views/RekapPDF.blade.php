<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan PDF Filament</title>
    <style>
        .kelas-section {
            page-break-after: always;
        }
        /* Opsional: Untuk menghindari page break di tengah tabel */
        table {
            page-break-inside: avoid;
        }
    </style>
</head>
<body>

    @foreach ($data->groupBy('kelas') as $kelas => $siswa)
        <div class="kelas-section">
            <h2>Kelas: {{ $kelas }}</h2>
            <table border="1" width="100%" height="80%">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Total Sakit</th>
                    <th>Total Izin</th>
                    <th>Total Alpha</th>
                </tr>
                @foreach ($siswa as $item)
                    <tr align="center">
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->sakit }}</td>
                        <td>{{ $item->izin }}</td>
                        <td>{{ $item->alpha }}</td>
                    </tr>
                @endforeach
            </table>
            <br>
        </div>
    @endforeach

    <!-- Pagination Links -->
    {{-- {{ $data->links() }} --}}

</body>
</html>
