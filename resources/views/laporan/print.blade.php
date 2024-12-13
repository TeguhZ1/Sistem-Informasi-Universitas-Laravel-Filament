<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Akademik</title>
    <style>
        :root {
            color-scheme: light dark;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background-color: #fff;
            color: #000;
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: #1a1a1a;
                color: #fff;
            }

            table {
                border-color: #404040 !important;
            }

            th {
                background-color: #2d2d2d !important;
                color: #fff !important;
                border-color: #404040 !important;
            }

            td {
                border-color: #404040 !important;
            }

            tr:hover {
                background-color: #2d2d2d !important;
            }

            .section {
                background-color: #242424;
                padding: 20px;
                border-radius: 8px;
            }

            button {
                background-color: #2d2d2d;
                color: #ffffff;
                border: 1px solid #404040;
            }

            button:hover {
                background-color: #404040;
            }
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 8px;
        }

        .section {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .no-print {
            text-align: center;
            margin-top: 30px;
        }

        button {
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            background-color: #f59e0b;
            color: white;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        button:hover {
            background-color: #fbbf24;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                background-color: white !important;
                color: black !important;
            }

            .section {
                background-color: white !important;
                box-shadow: none !important;
                border: none !important;
            }

            table, th, td {
                border-color: #000 !important;
            }

            th {
                background-color: #f4f4f4 !important;
                color: black !important;
            }
        }
    </style>
</head>
<body>
    <h1>Laporan Data Akademik</h1>

    <div class="section">
        <h2>Data Dosen</h2>
        <table>
            <thead>
                <tr>
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Bidang Keahlian</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosens as $dosen)
                    <tr>
                        <td>{{ $dosen->nidn }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $dosen->bidang_keahlian }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2>Data Mahasiswa</h2>
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>
                            @switch($mahasiswa->program_studi)
                                @case('TI')
                                    Teknik Informatika
                                    @break
                                @case('SI')
                                    Sistem Informasi
                                    @break
                                @case('ILKOM')
                                    Ilmu Komputer
                                    @break
                            @endswitch
                        </td>
                        <td>{{ $mahasiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2>Data Mata Kuliah</h2>
        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mataKuliah as $mk)
                    <tr>
                        <td>{{ $mk->kode }}</td>
                        <td>{{ $mk->nama }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>{{ $mk->semester }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="no-print">
        <button onclick="window.print()">Cetak Laporan</button>
    </div>
</body>
</html>
