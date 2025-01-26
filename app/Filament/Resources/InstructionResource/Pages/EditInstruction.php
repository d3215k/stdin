<?php

namespace App\Filament\Resources\InstructionResource\Pages;

use App\Filament\Resources\InstructionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInstruction extends EditRecord
{
    protected static string $resource = InstructionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Cetak')
                    ->url(fn () => route('cetak', $this->getRecord()))
                    ->icon('heroicon-m-printer')
                    ->button()
                    ->openUrlInNewTab(),
            Actions\DeleteAction::make(),
        ];
    }
}
