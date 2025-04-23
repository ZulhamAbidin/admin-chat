<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use Filament\Forms\Form;
use App\Models\Orang_tua;
use Filament\Tables\Table;
use App\Models\Pelanggaran;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use App\Filament\Resources\KelasResource;
use Filament\Forms\Components\DatePicker;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
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

                        Select::make('kelas_id')
                            ->label('Nama Kelas')
                            ->placeholder('Pilih Nama Kelas')
                            ->helperText('Tambah Kelas jika belum tersedia.')
                            ->options(
                                Kelas::all()->pluck('nama', 'id')
                            ),

                        Select::make('jurusan_id')
                            ->label('Jurusan')
                            ->placeholder('Pilih Jurusan')
                            ->helperText('Tambah Jurusan jika belum tersedia.')
                            ->options(
                                Jurusan::all()->pluck('nama', 'id')
                            ),

                        DatePicker::make('tanggal_lahir')
                            ->label('Tanggal Lahir')
                            ->required(),

                        Select::make('user_id')
                            ->label('Tautkan Dengan Akun Orang Tua')
                            ->helperText('Optional')
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
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama Peserta Didik')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->sortable(),

                TextColumn::make('kelas.nama')
                    ->label('Kelas')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable()
                    ->placeholder('Kelas Belum Ditambahkan'),

                TextColumn::make('jurusan.nama')
                    ->label('Jurusan')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable()
                    ->placeholder('Jurusan Belum Ditambahkan'),

                TextColumn::make('user.name')
                    ->label('Nama Orang Tua')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->placeholder('Belum Ditambahkan'),

                TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),

                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(50),

                TextColumn::make('pelanggaran_count')
                    ->label('Pelanggaran')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->counts('pelanggaran')
                    ->sortable()
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('kelolaPelanggaran')
                    ->label('Kelola Pelanggaran')
                    ->icon('heroicon-o-exclamation-triangle')
                    ->form(fn(Siswa $record) => [
                        CheckboxList::make('pelanggaran')
                            ->label('Pilih Pelanggaran')
                            ->options(Pelanggaran::query()->pluck('jenis', 'id')->toArray())
                            ->default(fn() => $record->pelanggaran()->pluck('pelanggaran.id')->toArray())
                            ->columns(2),
                    ])
                    ->action(function (array $data, Siswa $record) {
                        if (isset($data['pelanggaran'])) {
                            $record->pelanggaran()->sync($data['pelanggaran']);
                        } else {
                            $record->pelanggaran()->detach();
                        }

                        Notification::make()
                            ->title('Berhasil!')
                            ->body('Data pelanggaran telah diperbarui.')
                            ->success()
                            ->send();
                    })
                    ->modalHeading('Kelola Pelanggaran')
                    ->modalButton('Simpan')
                    ->color('warning'),

                Action::make('lihat_detail')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Detail Siswa & Pelanggaran')
                    ->modalContent(fn (Siswa $record) => view('filament.siswa.modal-pelanggaran', [
                        'user'        => $record->user,
                        'pelanggaran' => $record->pelanggaran,
                    ]))
                    ->modalActions([
                        Action::make('kirim_wa')
                            ->label('Kirim ke Whatsapp Orang Tua')
                            ->icon('heroicon-o-chat-bubble-oval-left-ellipsis')
                            ->url(fn (Siswa $record) => "https://wa.me/{$record->user?->telepon}?text=" . urlencode(
                                "Assalamualaikum Bapak/Ibu {$record->user->name}, kami dari SMKN 7 Makassar ingin menyampaikan pelanggaran yang dilakukan oleh {$record->nama} sebagai berikut:\n\n" .
                                $record->pelanggaran->map(function ($pelanggaran, $index) {
                                    return ($index + 1) . ". {$pelanggaran->jenis} pada tanggal " . Carbon::parse($pelanggaran->tanggal)->format('d M Y');
                                })->implode("\n")
                            ))
                            ->openUrlInNewTab()
                            ->visible(fn (Siswa $record) => $record->user && $record->user->telepon),
                        Action::make('close')
                            ->label('Tutup')
                            ->close(),
                    ])
                    ->visible(fn (Siswa $record) => $record->user || $record->pelanggaran->count() > 0)
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
