@extends('layouts.app')

@section('content')
    <h1>Laporan Data Dosen, Mahasiswa, dan Mata Kuliah</h1>

    <h2>Data Mahasiswa</h2>
    <ul>
        @foreach($mahasiswas as $mahasiswa)
            <li>{{ $mahasiswa->name }}</li>
        @endforeach
    </ul>

    <h2>Data Mata Kuliah</h2>
    <ul>
        @foreach($mataKuliah as $mataKuliahItem)
            <li>{{ $mataKuliahItem->name }}</li>
        @endforeach
    </ul>

    <h2>Data Dosen</h2>
    <ul>
        @foreach($dosens as $dosen)
            <li>{{ $dosen->name }}</li>
        @endforeach
    </ul>
@endsection
