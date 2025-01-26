<?php

namespace App\Filament\Resources\BankTujuanResource\Pages;

use App\Filament\Resources\BankTujuanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBankTujuans extends ListRecords
{
    protected static string $resource = BankTujuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
