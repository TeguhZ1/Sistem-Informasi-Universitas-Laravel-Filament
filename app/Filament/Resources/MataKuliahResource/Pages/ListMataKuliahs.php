<?php

namespace App\Filament\Resources\MataKuliahResource\Pages;

use App\Filament\Resources\MataKuliahResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMataKuliahs extends ListRecords
{
    protected static string $resource = MataKuliahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('')
                ->icon('heroicon-o-plus')
                ->tooltip('Add New Data')
                ->iconButton()
                ->size('lg'),
        ];
    }
}
