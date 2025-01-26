<?php

namespace App\Support;

class FormatCurrency
{
    public static function idr($number)
    {
        return 'Rp. ' . number_format($number, 0, ',', '.');
    }
}
