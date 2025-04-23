<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhoneResource\Pages;
use App\Filament\Resources\PhoneResource\RelationManagers;
use App\Models\Phone;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhoneResource extends Resource
{
    protected static ?string $model = Phone::class;

    protected static ?string $navigationIcon = 'heroicon-o-device-phone-mobile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            FileUpload::make('image')
                ->image()
                ->directory('hp-images')
                ->columnSpanFull(),

            TextInput::make('title')
                ->label('Nama HP')
                ->required()
                ->maxLength(255),

            Textarea::make('body')
                ->label('Deskripsi')
                ->rows(4)
                ->required(),

            TextInput::make('stok')
                ->label('Jumlah Stok')
                ->numeric()
                ->required()
                ->default(0),

            Select::make('status')
                ->label('Status')
                ->options([
                    'Tersedia' => 'Tersedia',
                    'Habis' => 'Habis',
                ])
                ->required(),

            Select::make('brand_id')
                ->label('Brand')
                ->relationship('brand', 'brand')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->circular() // optional, for rounded preview
                    ->url(fn ($record) => asset('storage/' . $record->image))
                    ->height(50), // optional
                TextColumn::make('title')->sortable()->searchable(),
                TextColumn::make('body')->limit(50),
                TextColumn::make('stok')->sortable(),
                TextColumn::make('status')->badge(),
                TextColumn::make('brand.brand')->label('Brand')->sortable(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                SelectFilter::make('brand_id')
                    ->label('Brand')
                    ->relationship('brand', 'brand'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListPhones::route('/'),
            'create' => Pages\CreatePhone::route('/create'),
            'edit' => Pages\EditPhone::route('/{record}/edit'),
        ];
    }
}
