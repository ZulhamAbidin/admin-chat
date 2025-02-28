<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use App\Models\Orang_tua;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\PelanggaranResource\RelationManagers\SiswaResourceRelationManager;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\RelationManagers;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Data Siswa')
                    ->schema([
                        TextInput::make('nis')
                            ->label('NIS')
                            ->required()
                            ->unique('Siswa', 'nis', fn($record) => $record)
                            ->validationMessages([
                                'unique' => 'NIS Telah Terdaftar.'
                            ])
                            ->maxLength(10),

                        TextInput::make('nama')
                            ->label('Nama Siswa')
                            ->required()
                            ->maxLength(255),

                        Select::make('kelas')
                            ->label('Kelas')
                            ->options([
                                'X' => 'Kelas X',
                                'XI' => 'Kelas XI',
                                'XII' => 'Kelas XII',
                            ])
                            ->searchable()
                            ->required(),

                        Textarea::make('alamat')
                            ->label('Alamat')
                            ->maxLength(500)
                            ->columnSpanFull(),

                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required(),

                            Select::make('user_id')
                            ->label('Tautkan Dengan Akun Orang Tua')
                            ->options(function ($record) {
                                return \App\Models\User::where('role', 'ortu')
                                    ->where(function ($query) use ($record) {
                                        $query->whereDoesntHave('siswa')
                                              ->orWhere('id', $record?->user_id); // Pastikan user yang sudah dipilih tetap muncul
                                    })
                                    ->pluck('name', 'id');
                            })
                            ->searchable()
                            ->preload(),                        

                        Forms\Components\Select::make('pelanggarans')
                            ->label('Pelanggaran')
                            ->multiple() // Bisa memilih lebih dari satu
                            ->relationship('pelanggarans', 'jenis') // Ambil data dari tabel pelanggaran
                            ->preload()
                            ->searchable(),


                        // ->searchable()
                        // ->preload()
                        // ->required(),


                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nis')
                    ->label('NIS')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama Peserta Didik')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kelas')
                    ->label('Kelas')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Nama Orang Tua')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Belum Ditambahkan'),

                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),

                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->limit(50),

                TextColumn::make('pelanggarans_count')
                    ->label('Jumlah Pelanggaran')
                    ->counts('pelanggarans')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\Action::make('lihat_pelanggaran')
                    ->label('Lihat Pelanggaran')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Detail Pelanggaran Siswa')
                    ->modalContent(fn($record) => view('filament.siswa.modal-pelanggaran', [
                        'pelanggarans' => $record->pelanggarans
                    ]))
                    ->visible(fn($record) => $record->pelanggarans->count() > 0),
                // Tables\Actions\Action::make('Detail')
                //     ->label('Detail')
                //     ->icon('heroicon-o-eye')
                //     ->modalHeading('Detail Orang Tua')
                //     ->modalSubheading('Informasi lengkap akun login orang tua siswa.')
                //     ->modalContent(fn($record) => view('filament.siswa.modal-orangtua', [
                //         'user' => $record->user
                //     ]))
                //     ->visible(fn($record) => $record->user_id !== null),
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
            RelationManagers\PelanggaranRelationManager::class,
        ];
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
