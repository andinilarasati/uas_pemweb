<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Bookings';
    protected static ?string $pluralModelLabel = 'Bookings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_pemesan')->required(),
                Forms\Components\TextInput::make('jumlah')->numeric()->required(),
                Forms\Components\TextInput::make('total_harga')->numeric()->required(),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
                Forms\Components\Select::make('tiket_id')
                    ->relationship('tiket', 'nama')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_pemesan')->label('Nama Pemesan')->searchable(),
                Tables\Columns\TextColumn::make('jumlah')->label('Jumlah Tiket'),
                Tables\Columns\TextColumn::make('total_harga')->label('Total Harga'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('tiket.nama')->label('Nama Tiket'),
                Tables\Columns\TextColumn::make('tiket.tempatWisata.nama')->label('Tempat Wisata'),
                Tables\Columns\TextColumn::make('created_at')->label('Tanggal Pesan')->dateTime(),
            ])
            ->headerActions([
                Action::make('Export PDF')
                    ->url(route('export.bookings.pdf'))
                    ->openUrlInNewTab(),

                Action::make('Export Excel')
                    ->url(route('export.bookings.excel'))
                    ->openUrlInNewTab(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
