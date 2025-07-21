<?php

namespace App\Filament\Admin\Resources\TempatWisataResource\Pages;

use App\Filament\Admin\Resources\TempatWisataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTempatWisatas extends ListRecords
{
    protected static string $resource = TempatWisataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
