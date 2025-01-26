<?php

namespace App\Filament\Resources\TujuanResource\Pages;

use App\Filament\Imports\TujuanImporter;
use App\Filament\Resources\TujuanResource;
use Filament\Actions;
use Filament\Actions\ImportAction;
use Filament\Resources\Pages\ListRecords;

class ListTujuans extends ListRecords
{
    protected static string $resource = TujuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ImportAction::make()
                ->label('Impor',)
                ->importer(TujuanImporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
