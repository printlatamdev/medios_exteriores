<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Models\Customer;
use App\Models\Externalmedia;
use App\Models\Sale;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
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

    protected static ?string $modelLabel = 'Contrato';

    protected static ?string $pluralModelLabel = 'Contratos';

    protected static ?string $navigationIcon = 'fas-file-contract';

    //protected static bool $shouldRegisterNavigation = false;

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
                Select::make('customer_id')
                    ->label('Cliente')
                    ->relationship('customer', 'name')
                    ->options(Customer::pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nombre de cliente')
                            ->required(),
                        Textarea::make('description')
                            ->rows(3)
                            ->cols(3),
                    ]),
                MoneyInput::make('total')->label('Total de pago')->disabled(),
                Section::make('Arrendamiento')->schema([
                    DatePicker::make('begin_date_rental')->label('Fecha de inicio'),
                    DatePicker::make('end_date_rental')->label('Fecha de finalización'),
                    TextInput::make('months')->label('Cantidad de meses'),
                    MoneyInput::make('total_rental')->label('Total mensual'),
                ])->columns(4),
                Section::make('Archivos adjuntos')->schema([
                    FileUpload::make('quote')
                        ->directory('files')
                        ->label('Cotización')
                        ->preserveFilenames(),
                    FileUpload::make('purchaseorder')
                        ->directory('files')
                        ->label('Orden de compra')
                        ->preserveFilenames(),
                ])->columns(2),
            /** Section::make('Cambio de lona')->schema([
                    DatePicker::make('tarp_date_change')->label('Fecha cambio de lona'),
                    MoneyInput::make('total_tarp')->label('Total'),
                ])->columns(2), */
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
                /**ColumnGroup::make('Cambio de lona', [
                    TextColumn::make('tarp_date_change')->label('Fecha de cambio'),
                    TextColumn::make('total_tarp')->label('Total'),
                ]), */
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
