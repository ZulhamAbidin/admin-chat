<?php

namespace App\Filament\Resources\JumbotronResource\Pages;

use App\Filament\Resources\JumbotronResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJumbotrons extends ListRecords
{
    protected static string $resource = JumbotronResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
