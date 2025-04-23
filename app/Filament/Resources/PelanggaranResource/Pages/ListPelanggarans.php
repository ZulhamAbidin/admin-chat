<?php

namespace App\Filament\Resources\PelanggaranResource\Pages;

use App\Filament\Resources\PelanggaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPelanggarans extends ListRecords
{
    protected static string $resource = PelanggaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
