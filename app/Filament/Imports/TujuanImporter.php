<?php

namespace App\Filament\Imports;

use App\Models\Tujuan;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class TujuanImporter extends Importer
{
    protected static ?string $model = Tujuan::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('kode')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('nama')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
        ];
    }

    public function resolveRecord(): ?Tujuan
    {
        return Tujuan::firstOrNew([
            // Update existing records, matching them by `$this->data['column_name']`
            'kode' => $this->data['kode'],
        ]);

        // return new Tujuan();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your tujuan import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
