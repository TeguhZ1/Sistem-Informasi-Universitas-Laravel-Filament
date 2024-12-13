<?php

namespace App\Filament\Resources\MataKuliahResource\Pages;

use App\Filament\Resources\MataKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMataKuliah extends CreateRecord
{
    protected static string $resource = MataKuliahResource::class;

    protected static ?string $title = 'Form Data Mata Kuliah';

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
