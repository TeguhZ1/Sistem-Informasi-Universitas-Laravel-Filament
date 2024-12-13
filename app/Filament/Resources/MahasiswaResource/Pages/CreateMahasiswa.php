<?php

namespace App\Filament\Resources\MahasiswaResource\Pages;

use App\Filament\Resources\MahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMahasiswa extends CreateRecord
{
    protected static string $resource = MahasiswaResource::class;

    protected static ?string $title = 'Form Data Mahasiswa';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
