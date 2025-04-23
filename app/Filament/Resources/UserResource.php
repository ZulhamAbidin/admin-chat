<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-lock-open';
    protected static ?string $navigationGroup = 'Data Sekolah';
    

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->label('Nama')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('telepon')
                ->label('Nomor Telepon')
                ->tel()
                ->maxLength(15)
                ->nullable(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->unique('users', 'email', ignoreRecord: true)
                ->required(),

            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->required(fn ($record) => $record === null)
                ->maxLength(255)
                ->dehydrateStateUsing(fn ($state) => !empty($state) ? bcrypt($state) : null)
                ->dehydrated(fn ($state) => !empty($state)),

            Forms\Components\Select::make('role')
                ->label('Peran')
                ->options([
                    'admin' => 'Admin',
                    'guru' => 'Guru',
                    'ortu' => 'Orang Tua',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Nama')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault:false),

            Tables\Columns\TextColumn::make('telepon')
                ->label('Nomor Telepon')
                ->placeholder('62xxxxxxxxxx')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault:true),

            Tables\Columns\TextColumn::make('email')
                ->label('Email')
                ->sortable()
                ->searchable()
                ->toggleable(isToggledHiddenByDefault:false),

            Tables\Columns\TextColumn::make('role')
                ->label('Peran')
                ->sortable()
                ->badge()
                ->colors([
                    'admin' => 'danger',
                    'guru' => 'info',
                    'ortu' => 'success',
                ])
                ->toggleable(isToggledHiddenByDefault:false),

            Tables\Columns\TextColumn::make('email_verified_at')
                ->label('Verifikasi Email')
                ->dateTime('d M Y H:i')
                ->sortable()
                ->placeholder('-')
                ->toggleable(isToggledHiddenByDefault:true),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat Pada')
                ->dateTime('d M Y H:i')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault:false),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('role')
                ->label('Filter Peran')
                ->options([
                    'admin' => 'Admin',
                    'guru' => 'Guru',
                    'ortu' => 'Orang Tua',
                ]),
                
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\ForceDeleteAction::make(),
            Tables\Actions\RestoreAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
