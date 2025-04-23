<?php
namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Landing Page';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Section::make('Informasi Guru')
                ->schema([
                    TextInput::make('nama')->required()->maxLength(255),
                    TextInput::make('jabatan')->required()->maxLength(255),
                    FileUpload::make('foto')->image()->directory('guru')->nullable(),
                ])
                ->collapsible(),

            Section::make('Detail Kontak')
                ->schema([
                    Textarea::make('alamat')->rows(3)->nullable(),
                    TextInput::make('no_ponsel')->tel()->nullable()->maxLength(20),
                ])
                ->collapsible(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            ImageColumn::make('foto')->circular(),
            TextColumn::make('nama')->sortable()->searchable(),
            TextColumn::make('jabatan')->sortable()->searchable(),
            TextColumn::make('no_ponsel')->sortable()->searchable(),
        ])->defaultSort('nama')
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}
