<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaleResource\Pages;
use App\Models\Customer;
use App\Models\Externalmedia;
use App\Models\Sale;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Hugomyb\FilamentMediaAction\Tables\Actions\MediaAction;
use Pelmered\FilamentMoneyField\Forms\Components\MoneyInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Illuminate\Database\Eloquent\Model;

class SaleResource extends Resource
{
    protected static ?string $model = Sale::class;

    protected static ?string $modelLabel = 'Contrato';

    protected static ?string $pluralModelLabel = 'Contratos';

    protected static ?string $navigationIcon = 'fas-file-contract';

    //protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('')->schema([
                Select::make('externalmedia_id')
                    ->label('Medio externo')
                    ->relationship('externalmedias', 'code')
                    ->options(Externalmedia::pluck('code', 'id'))
                    ->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->code} - {$record->address}")
                    ->required()
                    ->searchable()
                    ->searchingMessage('Buscando medios...')
                    ->searchDebounce(500)
                    ->columnSpan(2),
                Select::make('customer_id')
                    ->label('Cliente')
                    ->relationship('customer', 'name')
                    ->options(Customer::pluck('name', 'id'))
                    ->required()
                    ->searchable()
                    ->searchingMessage('Buscando cliente...')
                    ->searchDebounce(500)
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nombre de cliente')
                            ->required(),
                        Textarea::make('description')
                            ->label('Descripción')
                            ->rows(3)
                            ->cols(3),
                    ])->columnSpan(2),
                MoneyInput::make('total')
                    ->label('Total de pago')
                    ->readOnly()
                    ->live()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $result = $get('months') * $get('total_rental');
                        $set('total', $result);
                    })
                    ->columnSpan(1),
            ])->columns(5),
            Section::make('Arrendamiento')->schema([
                DatePicker::make('begin_date_rental')->label('Fecha de inicio'),
                DatePicker::make('expiration_date_rental')->label('Fecha de finalización'),
                TextInput::make('months')
                    ->label('Cantidad de meses')
                    ->reactive()
                    ->live(),
                TextInput::make('total_rental')
                    ->label('Total mensual')
                    ->reactive()
                    ->live(),
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
                TextColumn::make('externalmedias.code')->label('Medios'),
                TextColumn::make('customer.name')->label('Cliente'),
                ColumnGroup::make('Arrendamiento', [
                    TextColumn::make('begin_date_rental')->label('Fecha de inicio'),
                    TextColumn::make('expiration_date_rental')->label('Fecha final'),
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
                MediaAction::make('purchaseorder')
                    ->media(fn($record) => 'storage/' . $record->purchaseorder)
                    ->icon('fas-list')
                    ->iconButton()
                    ->label('Orden de compra')
                    ->tooltip('Ver Orden de compra')
                    ->size('xl'),
                MediaAction::make('quote')
                    ->media(fn($record) => 'storage/' . $record->quote)
                    ->icon('solar-chat-round-money-bold')
                    ->iconButton()
                    ->label('Cotización')
                    ->tooltip('Ver Cotización')
                    ->size('xl'),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->tooltip('Acciones'),
            ])
            ->bulkActions([]);
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
