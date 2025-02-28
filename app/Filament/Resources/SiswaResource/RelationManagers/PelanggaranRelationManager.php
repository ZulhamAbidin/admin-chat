<?php

namespace App\Filament\Resources\SiswaResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;
use Filament\Resources\RelationManagers\RelationManager;

class PelanggaranRelationManager extends RelationManager
{
    protected static string $relationship = 'pelanggarans'; // Sesuai dengan relasi di model Siswa.php

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('pelanggaran_id')
                ->label('Jenis Pelanggaran')
                ->relationship('pelanggarans', 'jenis')
                ->preload()
                ->searchable()
                ->required()
                ->validationMessages([
                    'required' => 'Silakan pilih jenis pelanggaran.',
                ]),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->maxLength(500)
                ->disabled() // Tidak bisa diubah karena mengikuti deskripsi dari pelanggaran
                ->columnSpanFull(),

            Forms\Components\DateTimePicker::make('tanggal')
                ->label('Tanggal Pelanggaran')
                ->default(now()) // Set default tanggal ke waktu saat ini
                ->disabled(), // Tidak bisa diubah (otomatis diambil dari `pelanggaran`)
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('jenis')
                ->label('Jenis Pelanggaran')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->limit(50)
                ->wrap(),

            Tables\Columns\TextColumn::make('tanggal')
                ->label('Tanggal')
                ->sortable()
                ->formatStateUsing(fn (string $state): string => Carbon::parse($state)->format('d M Y H:i'))
                ->placeholder('-'),
        ])
            ->actions([
            ])
            ->bulkActions([
            ]);
    }
}