<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DosenResource\Pages;
use App\Models\Dosen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class DosenResource extends Resource
{
    protected static ?string $model = Dosen::class;

    protected static ?string $modelLabel = 'Data Dosen';
    protected static ?string $pluralModelLabel = 'Data Dosen';
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nidn')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(18)
                    ->label('NIDN')
                    ->autocomplete(false),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128)
                    ->autocomplete(false),
                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),
                TextInput::make('alamat')
                    ->required()
                    ->maxLength(128)
                    ->autocomplete(false),
                DatePicker::make('tanggal_lahir')
                    ->required()
                    ->format('d/m/Y')
                    ->displayFormat('d/m/Y'),
                TextInput::make('bidang_keahlian')
                    ->label('Bidang Keahlian')
                    ->required()
                    ->maxLength(128),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nidn')
                    ->label('NIDN')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string =>
                        match($state) {
                            'L' => 'Laki-Laki',
                            'P' => 'Perempuan',
                            default => $state,
                        }),
                TextColumn::make('alamat')
                    ->searchable(),
                TextColumn::make('tanggal_lahir')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('bidang_keahlian')
                    ->label('Bidang Keahlian')
                    ->searchable()
                    ->sortable(),
            ])
            ->emptyStateHeading('Empty')
            ->emptyStateIcon('heroicon-o-document')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDosens::route('/'),
            'create' => Pages\CreateDosen::route('/create'),
            'edit' => Pages\EditDosen::route('/{record}/edit'),
        ];
    }
}
