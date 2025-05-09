<?php

namespace App\Filament\Resources\PenerimaResource\Pages;

use App\Filament\Imports\PenerimaImporter;
use App\Filament\Resources\PenerimaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPenerimas extends ListRecords
{
    protected static string $resource = PenerimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make()
                ->label('Import')
                ->importer(PenerimaImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
