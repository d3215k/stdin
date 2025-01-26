<?php

namespace App\Filament\Resources\BankSumberResource\Pages;

use App\Filament\Resources\BankSumberResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBankSumber extends EditRecord
{
    protected static string $resource = BankSumberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
