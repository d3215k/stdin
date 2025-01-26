<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SettingSekolah extends Settings
{
    public ?string $nama;
    public ?string $kop_surat;
    public ?string $nomor_surat;
    public ?string $tempat;

    public ?string $nama_kepala_sekolah;
    public ?string $nik_kepala_sekolah;
    public ?string $nip_kepala_sekolah;
    public ?string $hp_kepala_sekolah;

    public ?string $nama_bendahara;
    public ?string $nik_bendahara;
    public ?string $nip_bendahara;
    public ?string $hp_bendahara;

    public static function group(): string
    {
        return 'sekolah';
    }
}
