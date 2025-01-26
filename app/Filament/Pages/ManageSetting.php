<?php

namespace App\Filament\Pages;

use App\Settings\SettingSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class ManageSetting extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string $settings = SettingSekolah::class;

    protected static ?string $navigationGroup = 'Setting';

    protected static ?int $navigationSort = 10;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama'),
                Forms\Components\FileUpload::make('kop_surat')
                    ->image()
                    ->maxSize(512)
                    ->nullable(),
                Forms\Components\TextInput::make('nomor_surat'),

                Forms\Components\TextInput::make('nama_kepala_sekolah'),
                Forms\Components\TextInput::make('nik_kepala_sekolah'),
                Forms\Components\TextInput::make('nip_kepala_sekolah'),
                Forms\Components\TextInput::make('hp_kepala_sekolah'),

                Forms\Components\TextInput::make('nama_bendahara'),
                Forms\Components\TextInput::make('nik_bendahara'),
                Forms\Components\TextInput::make('nip_bendahara'),
                Forms\Components\TextInput::make('hp_bendahara'),
            ]);
    }
}
