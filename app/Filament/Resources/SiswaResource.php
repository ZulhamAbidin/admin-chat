<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Kelas;
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
use App\Filament\Resources\KelasResource;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Filament\Resources\PelanggaranResource\RelationManagers\SiswaResourceRelationManager;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationGroup = 'Data Sekolah';

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

                        Textarea::make('alamat')
                            ->label('Alamat')
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Select::make('idKelas')
                            ->label('Nama Kelas')
                            ->placeholder('Pilih Nama Kelas')
                            ->searchable()
                            ->helperText('Tambah Kelas jika belum tersedia.')
                            ->options(
                                Kelas::all()->pluck('namaKelas', 'id')
                            ),

                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required(),

                            Select::make('user_id')
                            ->label('Tautkan Dengan Akun Orang Tua')
                            ->options(function ($record) {
                                return \App\Models\User::where('role', 'ortu')
                                    ->where(function ($query) use ($record) {
                                        $query->whereDoesntHave('siswa')
                                              ->orWhere('id', $record?->user_id);
                                    })
                                    ->pluck('name', 'id');
                            })
                            ->searchable()
                            ->preload(),                        

                        Forms\Components\Select::make('pelanggarans')
                            ->label('Pelanggaran')
                            ->multiple()
                            ->relationship('pelanggarans', 'jenis')
                            ->preload()
                            ->searchable(),
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
                
                TextColumn::make('kelas.namaKelas')
                    ->label('Kelas')
                    ->sortable()
                    ->searchable()
                    ->placeholder('Belum Ditambahkan'),

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
                Tables\Actions\Action::make('lihat_pelanggaran')
                    ->label('Lihat Pelanggaran')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Detail Pelanggaran Siswa')
                    ->modalContent(fn($record) => view('filament.siswa.modal-pelanggaran', [
                        'pelanggarans' => $record->pelanggarans
                    ]))
                    ->visible(fn($record) => $record->pelanggarans->count() > 0),
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