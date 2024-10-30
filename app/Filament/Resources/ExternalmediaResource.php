<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExternalmediaResource\Pages;
use App\Models\Department;
use App\Models\District;
use App\Models\Externalmedia;
use App\Models\Mediatype;
use App\Models\Municipality;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
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
                Section::make()->schema([
                    TextInput::make('code')->label('Código')->required(),
                    Select::make('mediatype_id')
                        ->label('Tipo de medio')
                        ->options(Mediatype::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    Toggle::make('status')->label('Disponibilidad')->onColor('success')->offColor('danger')->inline(false),
                ])->columns(3),
                Section::make('Ubicación detallada')->schema([
                    Select::make('department_id')
                        ->label('Departamento')
                        ->reactive()
                        ->options(Department::pluck('name', 'id'))
                        ->searchable(),
                    Select::make('municipality_id')
                        ->label('Municipio')
                        ->reactive()
                        ->options(fn (Get $get) => Municipality::where('department_id', (int) $get('department_id'))->pluck('name', 'id'))
                        ->searchable(),
                    Select::make('district_id')
                        ->label('Distrito')
                        ->options(fn (Get $get) => District::where('municipality_id', (int) $get('municipality_id'))->pluck('name', 'id'))
                        ->searchable()
                        ->required(),
                    Textarea::make('address')->label('Dirección')->columnSpan(3)->required(),
                ])->columns(3),
                Section::make('Medidas')->schema([
                    TextInput::make('width')->label('Ancho'),
                    TextInput::make('height')->label('Alto'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Código'),
                ToggleColumn::make('status')->label('Disponibilidad'),
                Tables\Columns\TextColumn::make('address')->label('Dirección'),
                Tables\Columns\TextColumn::make('mediatype.name')->label('Tipo de medio'),
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
