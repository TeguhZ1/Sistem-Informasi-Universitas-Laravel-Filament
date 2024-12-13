<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Dosen;
use Filament\Navigation\NavigationItem;

class Laporan extends Page
{
    protected static string $view = 'filament.pages.laporan';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 4;
    protected static ?string $title = 'Laporan Data Akademik';

    public $mahasiswas;
    public $mataKuliah;
    public $dosens;

    public function mount()
    {
        $this->mahasiswas = Mahasiswa::orderBy('nim')->get();
        $this->mataKuliah = MataKuliah::orderBy('semester')->orderBy('kode')->get();
        $this->dosens = Dosen::orderBy('nidn')->get();
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('print')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->url(route('laporan.print'), true)
                ->openUrlInNewTab(),
        ];
    }
}
