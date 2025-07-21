<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\TiketResource\Pages;
use App\Models\Tiket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TiketResource extends Resource
{
    protected static ?string $model = Tiket::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    protected static ?string $navigationLabel = 'Tiket';
    protected static ?string $pluralModelLabel = 'Tiket';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('tempat_wisata_id')
                    ->relationship('tempatWisata', 'nama')
                    ->label('Tempat Wisata')
                    ->required(),
                Forms\Components\TextInput::make('kode_tiket')->required(),
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\DatePicker::make('tanggal')->required(),
                Forms\Components\TextInput::make('stok')->numeric()->required(),
                Forms\Components\TextInput::make('harga')->numeric()->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_tiket')->searchable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('tanggal')->date(),
                Tables\Columns\TextColumn::make('stok'),
                Tables\Columns\TextColumn::make('harga')->money('IDR'),
                Tables\Columns\TextColumn::make('tempatWisata.nama')->label('Tempat Wisata'),
            ])
            ->filters([
                //
            ])
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
            'index' => Pages\ListTikets::route('/'),
            'create' => Pages\CreateTiket::route('/create'),
            'edit' => Pages\EditTiket::route('/{record}/edit'),
        ];
    }
}
