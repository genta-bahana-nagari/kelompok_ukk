<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KeluarResource\Pages;
use App\Filament\Resources\KeluarResource\RelationManagers;
use App\Models\BarangKeluar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KeluarResource extends Resource
{
    protected static ?string $model = BarangKeluar::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-up-tray';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('phone_id')
                    ->label('Phone')
                    ->relationship('phone', 'title')
                    ->required(),

                TextInput::make('qty_masuk')
                    ->label('QTY_Masuk')
                    ->numeric()
                    ->required(),   
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('phone.image')
                    ->label('Image')
                    ->circular() // optional, for rounded preview
                    ->url(fn($record) => asset('storage/' . $record->image))
                    ->height(50), // optional
                TextColumn::make('phone.title')->label('Phone')->sortable(),
                TextColumn::make('qty_masuk')->label('QTY_Masuk')->sortable(),
                TextColumn::make('created_at')->dateTime(),
                TextColumn::make('updated_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListKeluars::route('/'),
            'create' => Pages\CreateKeluar::route('/create'),
            'edit' => Pages\EditKeluar::route('/{record}/edit'),
        ];
    }
}
