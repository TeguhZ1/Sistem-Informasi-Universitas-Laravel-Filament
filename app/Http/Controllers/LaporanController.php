<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function print()
    {
        $data = [
            'dosens' => Dosen::orderBy('nidn')->get(),
            'mahasiswas' => Mahasiswa::orderBy('nim')->get(),
            'mataKuliah' => MataKuliah::orderBy('semester')->orderBy('kode')->get(),
        ];

        return view('laporan.print', $data);
    }
}
