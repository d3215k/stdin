<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstructionResource\Pages;
use App\Filament\Resources\InstructionResource\RelationManagers;
use App\Models\BankSumber;
use App\Models\BankTujuan;
use App\Models\Instruction;
use App\Models\Penerima;
use App\Models\Tujuan;
use App\Settings\SettingSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstructionResource extends Resource
{
    protected static ?string $model = Instruction::class;

    protected static ?string $modelLabel = 'Standing Instruction';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(255)
                    ->default(date('Y'))
                    ->columnSpan(1),
                Forms\Components\TextInput::make('nomor')
                    ->required()
                    ->maxLength(255)
                    ->suffix(function () {
                        $settings = new SettingSekolah();
                        return $settings->nomor_surat;
                    })
                    ->columnSpan(2),
                Forms\Components\TextInput::make('lampiran')
                    ->suffix('Lembar')
                    ->numeric()
                    ->required()
                    ->columnSpan(1),
                Forms\Components\TextInput::make('perihal')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Select::make('bank_sumber_id')
                    ->options(BankSumber::pluck('nama', 'id'))
                    ->label('Bank Sumber')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Select::make('bank_tujuan_id')
                    ->options(BankTujuan::pluck('nama', 'id'))
                    ->label('Bank Tujuan')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpan(2),
                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->numeric()
                    ->columnSpan(2),
                Forms\Components\DatePicker::make('tanggal')
                    ->required()
                    ->columnSpan(2),
                Forms\Components\Repeater::make('tujuan')
                    ->columnSpanFull()
                    ->schema([
                        Forms\Components\Select::make('tujuan_id')
                            ->label('Tujuan Penggunaan Dana')
                            ->options(Tujuan::pluck('nama', 'id'))
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function ($state, Set $set) {
                                $tujuan = Tujuan::find($state);
                                $set('kode_rekening', $tujuan->kode);
                                $set('nama_tujuan', $tujuan->nama);
                            })
                            ->searchable()
                            ->columnSpan(2),
                        Forms\Components\Hidden::make('nama_tujuan')
                            ->required()
                            ->dehydrated()
                            ,
                        Forms\Components\TextInput::make('kode_rekening')
                            ->disabled()
                            ->required()
                            ->dehydrated()
                            ->columnSpan(2)
                            ,
                        Forms\Components\Select::make('penerima_id')
                            ->label('Penerima')
                            ->searchable()
                            ->options(fn () => Penerima::pluck('nama', 'id'))
                            ->preload()
                            ->reactive()
                            ->afterStateUpdated(function ($state, Set $set) {
                                $penerima = Penerima::find($state);
                                if($penerima) {
                                    $set('atas_nama', $penerima->nama);
                                    $set('no_rekening', $penerima->no_rekening);
                                }
                            })
                            ->createOptionForm([
                                Forms\Components\TextInput::make('nama')
                                    ->required(),
                                Forms\Components\TextInput::make('no_rekening')
                                    ->required(),
                            ])
                            ->createOptionUsing(function (array $data): int {
                                return Penerima::create($data)->id;
                            })
                            ->columnSpan(2),
                        Forms\Components\Hidden::make('atas_nama')
                            ->required()
                            ->dehydrated(),
                        Forms\Components\TextInput::make('no_rekening')
                            ->disabled()
                            ->required()
                            ->dehydrated()
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('jumlah_transfer')
                            ->required()
                            ->numeric()
                            ->columnSpan(1),
                        Forms\Components\Textarea::make('keterangan')
                            ->required()
                            ->columnSpanFull(),
                    ])->columnSpanFull()
                    ->columns([
                        'sm' => 4,
                    ]),
            ])
            ->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nomor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('perihal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Cetak')
                    ->url(fn (Instruction $record) => route('cetak', $record))
                    ->icon('heroicon-m-printer')
                    ->openUrlInNewTab()
                    ->iconButton(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstructions::route('/'),
            'create' => Pages\CreateInstruction::route('/create'),
            'edit' => Pages\EditInstruction::route('/{record}/edit'),
        ];
    }
}
