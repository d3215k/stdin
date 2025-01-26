<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('sekolah.nama', 'SMKN 1 CIBADAK');
        $this->migrator->add('sekolah.kop_surat', '');
        $this->migrator->add('sekolah.tempat', 'Sukabumi');
        $this->migrator->add('sekolah.nomor_surat', '/KU.10.01/SMKN1-CADISDIK.WIL V');

        $this->migrator->add('sekolah.nama_kepala_sekolah', 'Iwan, S.Pd');
        $this->migrator->add('sekolah.nik_kepala_sekolah', '3202472505690001');
        $this->migrator->add('sekolah.nip_kepala_sekolah', '196905251992031006');
        $this->migrator->add('sekolah.hp_kepala_sekolah', '08568811455');

        $this->migrator->add('sekolah.nama_bendahara', 'Irpan Syauri, S.Kom');
        $this->migrator->add('sekolah.nik_bendahara', '3202300606860004');
        $this->migrator->add('sekolah.nip_bendahara', '198606062022211032');
        $this->migrator->add('sekolah.hp_bendahara', '085659604324');
    }
};
