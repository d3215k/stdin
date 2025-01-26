<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Instruction extends Model
{
    protected function casts(): array
    {
        return [
            'tujuan' => 'array',
            'tanggal' => 'date',
        ];
    }

    public function bankSumber(): BelongsTo
    {
        return $this->belongsTo(BankSumber::class);
    }

    public function bankTujuan(): BelongsTo
    {
        return $this->belongsTo(BankTujuan::class);
    }
}
