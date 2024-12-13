<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MataKuliahResource\Pages;
use App\Models\MataKuliah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class MataKuliahResource extends Resource
{
    protected static ?string $model = MataKuliah::class;

    protected static ?string $modelLabel = ' Data Mata Kuliah';
    protected static ?string $pluralModelLabel = 'Data Mata Kuliah';
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('kode')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(10)
                    ->autocomplete(false),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128)
                    ->autocomplete(false),
                TextInput::make('sks')
                    ->label('SKS')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(6),
                Select::make('semester')
                    ->options([
                        '1' => 'Semester 1',
                        '2' => 'Semester 2',
                        '3' => 'Semester 3',
                        '4' => 'Semester 4',
                        '5' => 'Semester 5',
                        '6' => 'Semester 6',
                        '7' => 'Semester 7',
                        '8' => 'Semester 8',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('nama')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('sks')
                    ->label('SKS')
                    ->sortable(),
                TextColumn::make('semester')
                    ->sortable()
                    ->formatStateUsing(fn (string $state): string => '' . $state),
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
            'index' => Pages\ListMataKuliahs::route('/'),
            'create' => Pages\CreateMataKuliah::route('/create'),
            'edit' => Pages\EditMataKuliah::route('/{record}/edit'),
        ];
    }
}
