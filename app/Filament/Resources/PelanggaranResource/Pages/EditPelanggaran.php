<?php

namespace App\Filament\Resources\PelanggaranResource\Pages;

use App\Filament\Resources\PelanggaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPelanggaran extends EditRecord
{
    protected static string $resource = PelanggaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
