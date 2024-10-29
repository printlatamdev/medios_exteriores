<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExternalmediaResource\Pages;
use App\Models\Externalmedia;
use App\Models\Mediatype;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ExternalmediaResource extends Resource
{
    protected static ?string $model = Externalmedia::class;

    protected static ?string $modelLabel = 'Medio exterior';
    protected static ?string $pluralModelLabel = 'Medios exteriores';

    protected static ?string $navigationIcon = 'heroicon-m-rocket-launch';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('status')->label('Disponibilidad')->onColor('success')->offColor('danger')->inline(true),TextInput::make('code')->label('Código')->required(),
                Select::make('mediatype_id')
                    ->label('Tipo de medio')
                    ->options(Mediatype::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                /**Select::make('location_id')
                    ->label('Tipo de medio')
                    ->options(Mediatype::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(), */
                Textarea::make('address')->label('Dirección')->columnSpan(2)->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListExternalmedia::route('/'),
            'create' => Pages\CreateExternalmedia::route('/create'),
            'edit' => Pages\EditExternalmedia::route('/{record}/edit'),
        ];
    }
}
