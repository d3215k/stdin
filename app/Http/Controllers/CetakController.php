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
        $tujuan = collect($data)->map(function ($item) {
                return [
                    'nama_tujuan' => $item['nama_tujuan'],
                    'kode_rekening' => $item['kode_rekening'],
                ];
            })
            ->unique()
            ->sortBy('kode_rekening')
            ->values();

        return view('cetak', [
            'instruction' => $instruction,
            'setting' => $setting,
            'tujuan' => $tujuan,
        ]);
    }
}
