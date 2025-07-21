<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TempatWisataResource\Pages;
use App\Models\TempatWisata;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TempatWisataResource extends Resource
{
    protected static ?string $model = TempatWisata::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationLabel = 'Tempat Wisata';
    protected static ?string $pluralModelLabel = 'Tempat Wisata';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required()->label('Nama Tempat Wisata'),
                Forms\Components\TextInput::make('lokasi')->required()->label('Lokasi'),
                Forms\Components\Textarea::make('deskripsi')->label('Deskripsi')->rows(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable()->label('Nama'),
                Tables\Columns\TextColumn::make('lokasi')->label('Lokasi'),
                Tables\Columns\TextColumn::make('deskripsi')->limit(30)->label('Deskripsi'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTempatWisatas::route('/'),
            'create' => Pages\CreateTempatWisata::route('/create'),
            'edit' => Pages\EditTempatWisata::route('/{record}/edit'),
        ];
    }
}
