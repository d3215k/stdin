<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use App\Settings\SettingSekolah;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Instruction $instruction, SettingSekolah $setting)
    {
        $data = $instruction->tujuan;
        $tujuanItems = collect($data)->map(function ($item) {
                return [
                    'nama_tujuan' => $item['nama_tujuan'],
                    'kode_rekening' => $item['kode_rekening'],
                ];
            })
            // ->sortBy('kode_rekening', SORT_NATURAL | SORT_FLAG_CASE)
            ->unique()
            ->values();

        return view('cetak', [
            'instruction' => $instruction,
            'setting' => $setting,
            'tujuanItems' => $tujuanItems,
        ]);
    }
}
