<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $modelLabel = 'Data Mahasiswa';
    protected static ?string $pluralModelLabel = 'Data Mahasiswa';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = ' Data Mahasiswa';
    protected static ?string $navigationGroup = 'Akademik';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nim')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(13)
                    ->label('NIM')
                    ->autocomplete(false),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128)
                    ->autocomplete(false),
                Select::make('jenis_kelamin')
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
                Select::make('program_studi')
                    ->label('Program Studi')
                    ->options([
                        'TI' => 'Teknik Informatika',
                        'SI' => 'Sistem Informasi',
                        'ILKOM' => 'Ilmu Komputer',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')
                    ->label('NIM')
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
                TextColumn::make('program_studi')
                    ->label('Program Studi')
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string =>
                        match($state) {
                            'TI' => 'Teknik Informatika',
                            'SI' => 'Sistem Informasi',
                            'ILKOM' => 'Ilmu Komputer',
                            default => $state,
                        }),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
