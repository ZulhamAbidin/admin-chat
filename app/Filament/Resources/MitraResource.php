<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Mitra;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MitraResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MitraResource\RelationManagers;

class MitraResource extends Resource
{
    protected static ?string $model = Mitra::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?string $navigationGroup = 'Landing Page';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Jurusan')
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->email()
                            ->unique()
                            ->required(),

                        TextInput::make('telepon')
                            ->tel()
                            ->required()
                            ->maxLength(15),

                        Textarea::make('alamat')
                            ->maxLength(500),

                        FileUpload::make('foto')
                            ->directory('mitra')
                            ->image()
                            ->imageEditor()
                            ->maxSize(10048),

                        Textarea::make('deskripsi')
                            ->maxLength(1000),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                ->size(40)
                ->circular(),
                TextColumn::make('nama')
                ->sortable()
                ->searchable(),
                TextColumn::make('email')
                ->sortable()
                ->searchable(),
                TextColumn::make('telepon')
                ->sortable(),
                TextColumn::make('alamat')
                ->limit(50),
                TextColumn::make('deskripsi')
                ->limit(50),
                TextColumn::make('created_at')
                ->dateTime('d M Y'),
            ])
            ->filters([])
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMitras::route('/'),
            'create' => Pages\CreateMitra::route('/create'),
            'edit' => Pages\EditMitra::route('/{record}/edit'),
        ];
    }
}
