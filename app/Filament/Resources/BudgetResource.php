<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudgetResource\Pages;
use App\Models\Budget;
use App\Models\Externalmedia;
use Filament\Forms\Components\DatePicker;
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

class BudgetResource extends Resource
{
    protected static ?string $model = Budget::class;

    protected static ?string $modelLabel = 'Gasto';

    protected static ?string $pluralModelLabel = 'Gastos';

    protected static ?string $navigationIcon = 'fas-wallet';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('externalmedia_id')
                    ->label('Medio externo')
                    ->relationship('externalmedias', 'code')
                    ->options(Externalmedia::pluck('code', 'id'))
                    ->searchable(),
                TextInput::make('total_payment')->label('Total de gasto')->disabled(),
                Section::make('Fianza')->schema([
                    DatePicker::make('expiration_date_bail')->label('Fecha de vencimiento'),
                    DatePicker::make('payment_date_bail')->label('Fecha de pago'),
                    MoneyInput::make('total_bail')->label('Total'),
                ])->columns(3),
                Section::make('Seguro de daños a terceros')->schema([
                    DatePicker::make('expiration_date_damageinsurance')->label('Fecha de vencimiento'),
                    DatePicker::make('payment_date_damageinsurance')->label('Fecha de pago'),
                    MoneyInput::make('total_damageinsurance')->label('Total'),
                ])->columns(3),
                Section::make('Alcaldía')->schema([
                    DatePicker::make('expiration_date_municipality')->label('Fecha de vencimiento'),
                    DatePicker::make('payment_date_municipality')->label('Fecha de pago'),
                    MoneyInput::make('total_municipality')->label('Total'),
                ])->columns(3),
                Section::make('Arrendamiento')->schema([
                    DatePicker::make('expiration_date_rental')->label('Fecha de vencimiento'),
                    DatePicker::make('payment_date_rental')->label('Fecha de pago'),
                    MoneyInput::make('total_rental')->label('Total'),
                ])->columns(3),
                Section::make('Mantenimiento')->schema([
                    Textarea::make('maintenance_description')->label('Descripción de mantenimiento')->columnSpan(2),
                    MoneyInput::make('total_maintenance')->label('Total'),
                ])->columns(3),
                Section::make('Energía eléctrica')->schema([
                    Select::make('electricity_provider')
                        ->label('Proveedor de energía')
                        ->options([
                            'DELSUR' => 'DEL SUR',
                            'CAESS' => 'CAESS',
                            'CLESA' => 'CLESA',
                            'EEO' => 'EEO',
                        ])
                        ->required(),
                    TextInput::make('electricity_NIC_NIS')->label('NIC/NIS'),
                    TextInput::make('electricity_new_NC')->label('Nuevo NC'),
                    DatePicker::make('expiration_date_electricity')->label('Fecha de vencimiento'),
                    DatePicker::make('payment_date_electricity')->label('Fecha de pago'),
                    MoneyInput::make('total_electricity')->label('Total'),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('externalmedias.code')->label('Medio'),
                ColumnGroup::make('Fianza', [
                    TextColumn::make('expiration_date_bail')->label('Fecha de vencimiento fianza'),
                    TextColumn::make('payment_date_bail')->label('Fecha de cancelada fianza'),
                    TextColumn::make('total_bail')->label('Total de fianza'),
                ]),
                ColumnGroup::make('Medidas', [
                    TextColumn::make('expiration_date_damageinsurance')->label('Fecha de vencimiento seguro'),
                    TextColumn::make('payment_date_damageinsurance')->label('Fecha de cancelado seguro'),
                    TextColumn::make('total_damageinsurance')->label('Total de seguro'),
                ]),
                ColumnGroup::make('Alcaldía', [
                    TextColumn::make('expiration_date_municipality')->label('Fecha de vencimiento alcaldía'),
                    TextColumn::make('payment_date_municipality')->label('Fecha de cancelada alcaldía'),
                    TextColumn::make('total_municipality')->label('Total de alcaldía'),
                ]),
                ColumnGroup::make('Arrenfamiento', [
                    TextColumn::make('expiration_date_rental')->label('Fecha de vencimiento arrendamiento'),
                    TextColumn::make('payment_date_rental')->label('Fecha de pago arrendamiento'),
                    TextColumn::make('total_rental')->label('Total de arrendamiento'),
                ]),
                ColumnGroup::make('Manteniemto', [
                    TextColumn::make('maintenance_description')->label('Fecha de vencimiento mantenimiento'),
                    TextColumn::make('total_maintenance')->label('Total de mantenimiento'),
                ]),
                ColumnGroup::make('Energía eléctrica', [
                    TextColumn::make('electricity_provider')->label('Proveedor'),
                    TextColumn::make('electricity_NIC_NIS')->label('NIC/NIS'),
                    TextColumn::make('electricity_new_NC')->label('Nuevo NC'),
                    TextColumn::make('expiration_date_electricity')->label('Fecha de vencimiento de energía'),
                    TextColumn::make('payment_date_electricity')->label('Fecha de pago de energía'),
                    TextColumn::make('total_electricity')->label('Total de energía'),
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
            'index' => Pages\ListBudgets::route('/'),
            'create' => Pages\CreateBudget::route('/create'),
            'edit' => Pages\EditBudget::route('/{record}/edit'),
        ];
    }
}
