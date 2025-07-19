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


    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('')->schema([
                Select::make('externalmedias')
                    ->label('Medio externo')
                    // ->relationship('externalmedias', 'code')
                    ->getOptionLabelFromRecordUsing(fn(Model $record) => "{$record->code} - {$record->address}")
                    ->multiple(false) // ← para seleccionar solo uno
                    ->preload()
                    ->searchable()
                    ->searchingMessage('Buscando medios...')
                    ->searchDebounce(500)
                    ->options(Externalmedia::disponiblesParaContrato()) // ← solo disponibles
                    ->required()
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
                    ])
                    ->columnSpan(2),

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
                DatePicker::make('begin_date_rental')
                    ->label('Fecha de inicio')
                    ->reactive()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $inicio = $get('begin_date_rental');
                        $fin = $get('expiration_date_rental');
                        $mensual = $get('total_rental');

                        if ($inicio && $fin) {
                            $start = \Carbon\Carbon::parse($inicio);
                            $end = \Carbon\Carbon::parse($fin);

                            if ($start->gt($end)) {
                                $set('months', null);
                                $set('total', null);
                                return;
                            }

                            $months = $start->diffInMonths($end) + 1;
                            $set('months', $months);
                            $set('total', $months * ($mensual ?? 0));
                        }
                    }),

                DatePicker::make('expiration_date_rental')
                    ->label('Fecha de finalización')
                    ->reactive()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $inicio = $get('begin_date_rental');
                        $fin = $get('expiration_date_rental');
                        $mensual = $get('total_rental');

                        if ($inicio && $fin) {
                            $start = \Carbon\Carbon::parse($inicio);
                            $end = \Carbon\Carbon::parse($fin);

                            if ($start->gt($end)) {
                                $set('months', null);
                                $set('total', null);
                                return;
                            }

                            $months = $start->diffInMonths($end) + 1;
                            $set('months', $months);
                            $set('total', $months * ($mensual ?? 0));
                        }
                    }),

                TextInput::make('months')
                    ->label('Cantidad de meses')
                    ->readOnly()
                    ->live(),

                TextInput::make('total_rental')
                    ->label('Total mensual')
                    ->numeric()
                    ->reactive()
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $inicio = $get('begin_date_rental');
                        $fin = $get('expiration_date_rental');
                        $mensual = $get('total_rental');

                        if ($inicio && $fin) {
                            $start = \Carbon\Carbon::parse($inicio);
                            $end = \Carbon\Carbon::parse($fin);

                            if ($start->gt($end)) {
                                $set('months', null);
                                $set('total', null);
                                return;
                            }

                            $months = $start->diffInMonths($end) + 1;
                            $set('months', $months);
                            $set('total', $months * ($mensual ?? 0));
                        }
                    }),
            ])->columns(4),

            Section::make('Archivos adjuntos')->schema([
                FileUpload::make('quote')
                    ->directory('files')
                    ->label('Cotización')
                    ->preserveFilenames(),

                FileUpload::make('purchaseorder')  // ← aquí inicia correctamente
                    ->directory('files')
                    ->label('Orden de compra')
                    ->preserveFilenames(), // ← esta coma está bien
            ])
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
