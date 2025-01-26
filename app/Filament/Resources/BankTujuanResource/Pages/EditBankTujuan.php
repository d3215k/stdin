<?php

namespace App\Filament\Resources\BankTujuanResource\Pages;

use App\Filament\Resources\BankTujuanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBankTujuan extends EditRecord
{
    protected static string $resource = BankTujuanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
