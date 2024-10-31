<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BudgetResource\Pages;
use App\Models\Budget;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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
                Section::make('Fianza')->schema([
                    TextInput::make('expiration_date_bail')->label('Fecha de vencimiento'),
                    TextInput::make('payment_date_bail')->label('Fecha de pago'),
                    TextInput::make('total_bail')->label('Total'),
                ])->columns(3),
                Section::make('Seguro de daños a terceros')->schema([
                    TextInput::make('expiration_date_damageinsurance')->label('Fecha de vencimiento'),
                    TextInput::make('payment_date_damageinsurance')->label('Fecha de pago'),
                    TextInput::make('total_damageinsurance')->label('Total'),
                ])->columns(3),
                Section::make('Alcaldía')->schema([
                    TextInput::make('expiration_date_municipality')->label('Fecha de vencimiento'),
                    TextInput::make('payment_date_municipality')->label('Fecha de pago'),
                    TextInput::make('total_municipality')->label('Total'),
                ])->columns(3),
                Section::make('Arrendamiento')->schema([
                    TextInput::make('total_rental')->label('Fecha de vencimiento'),
                    TextInput::make('payment_date_municipality')->label('Fecha de pago'),
                    TextInput::make('total_rental')->label('Total'),
                ])->columns(3),
                Section::make('Mantenimiento')->schema([
                    Textarea::make('maintenance_description')->label('Descripción de mantenimiento')->columnSpan(2),
                    TextInput::make('total_maintenance')->label('Fecha de vencimiento'),
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
                    TextInput::make('expiration_date_electricity')->label('Fecha de vencimiento'),
                    TextInput::make('payment_date_electricity')->label('Fecha de pago'),
                    TextInput::make('total_electricity')->label('Total'),
                ])->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListBudgets::route('/'),
            'create' => Pages\CreateBudget::route('/create'),
            'edit' => Pages\EditBudget::route('/{record}/edit'),
        ];
    }
}
