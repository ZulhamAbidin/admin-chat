<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PimpinanResource\Pages;
use App\Models\Pimpinan;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class PimpinanResource extends Resource
{
    protected static ?string $model = Pimpinan::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Landing Page';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Section::make('Informasi Pimpinan')
                ->schema([
                    TextInput::make('nama')->required()->maxLength(255),
                    TextInput::make('jabatan')->required()->maxLength(255),
                    FileUpload::make('foto')->image()->directory('pimpinan')->nullable(),
                ])
                ->collapsible(),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            ImageColumn::make('foto')->circular(),
            TextColumn::make('nama')->sortable()->searchable(),
            TextColumn::make('jabatan')->sortable(),
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
            'index' => Pages\ListPimpinans::route('/'),
            'create' => Pages\CreatePimpinan::route('/create'),
            'edit' => Pages\EditPimpinan::route('/{record}/edit'),
        ];
    }
}