<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Select::make('metode')
                ->label('Metode Pembayaran')
                ->options([
                    'DANA' => 'DANA',
                    'GOPAY' => 'GOPAY',
                    'OVO' => 'OVO',
                    'ShopeePay' => 'ShopeePay',
                ])
                ->required(),

            Select::make('user_id')
                ->label('User')
                ->relationship('user', 'name')
                ->required(),

            Select::make('order_id')
                ->label('Order')
                ->relationship('order', 'id')
                ->required(),

            Select::make('status')
                ->label('Status Pembayaran')
                ->options([
                    'pending' => 'Pending',
                    'success' => 'Success',
                    'failed' => 'Failed',
                ])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('metode')->sortable()->searchable(),
                TextColumn::make('user.name')->label('User')->sortable(),
                TextColumn::make('order.id')->label('Order ID')->sortable(),
                TextColumn::make('status')->badge(),
                TextColumn::make('created_at')->dateTime(),
            ])->filters([
                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'pending' => 'Pending',
                        'success' => 'Success',
                        'failed' => 'Failed',
                    ]),

                SelectFilter::make('metode')
                    ->label('Filter Metode Pembayaran')
                    ->options([
                        'DANA' => 'DANA',
                        'GOPAY' => 'GOPAY',
                        'OVO' => 'OVO',
                        'ShopeePay' => 'ShopeePay',
                    ])

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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
