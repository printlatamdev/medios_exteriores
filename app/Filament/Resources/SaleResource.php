<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Models\Externalmedia;
use App\Models\Sale;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $modelLabel = 'Venta';

    protected static ?string $pluralModelLabel = 'Ventas';

    protected static ?string $navigationIcon = 'fas-tags';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('externalmedia_id')
                    ->label('Medio externo')
                    ->relationship('externalmedias', 'code')
                    ->options(Externalmedia::pluck('code', 'id'))
                    ->required()
                    ->searchable(),
                MoneyInput::make('total')->label('Total de gasto')->disabled(),
                Section::make('Arrendamiento')->schema([
                    DatePicker::make('expiration_date_rental')->label('Fecha de vencimiento'),
                    DatePicker::make('payment_date_rental')->label('Fecha de pago'),
                    MoneyInput::make('total_rental')->label('Total'),
                ])->columns(3),
                Section::make('Arrendamiento')->schema([
                    DatePicker::make('tarp_date_change')->label('Fecha cambio de lona'),
                    MoneyInput::make('total_tarp')->label('Total'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('externalmedias.code')->label('Medio'),
                ColumnGroup::make('Arrendamiento', [
                    TextColumn::make('expiration_date_rental')->label('Fecha de vencimiento arrendamiento'),
                    TextColumn::make('payment_date_rental')->label('Fecha de pago arrendamiento'),
                    TextColumn::make('total_rental')->label('Total de arrendamiento'),
                ]),
                ColumnGroup::make('Cambio de lona', [
                    TextColumn::make('tarp_date_change')->label('Fecha de cambio'),
                    TextColumn::make('total_tarp')->label('Total'),
                ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->tooltip('Acciones'),
            ])
            ->bulkActions([

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
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSale::route('/create'),
            'edit' => Pages\EditSale::route('/{record}/edit'),
        ];
    }
}
