<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JumbotronResource\Pages;
use App\Models\Jumbotron;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;

class JumbotronResource extends Resource
{
    protected static ?string $model = Jumbotron::class;
    protected static ?string $navigationLabel = 'Slider';
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Landing Page';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Section::make('Jumbotron')
                ->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Textarea::make('description')
                        ->nullable(),
                    FileUpload::make('image')
                        ->image()
                        ->directory('jumbotron')
                        ->nullable(),
                    Grid::make(2)->schema([
                        TextInput::make('button_text')->nullable(),
                        TextInput::make('button_link')->nullable(),
                    ]),
                ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable(),
                TextColumn::make('description')->limit(50),
                TextColumn::make('button_text')->label('Button'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJumbotrons::route('/'),
            'create' => Pages\CreateJumbotron::route('/create'),
            'edit' => Pages\EditJumbotron::route('/{record}/edit'),
        ];
    }
}

