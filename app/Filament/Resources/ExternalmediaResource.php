<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExternalmediaResource\Pages;
use App\Models\Department;
use App\Models\District;
use App\Models\Externalmedia;
use App\Models\Mediatype;
use App\Models\Municipality;
use ArberMustafa\FilamentLocationPickrField\Forms\Components\LocationPickr;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColumnGroup;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

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
                    TextInput::make('code')->label('Código')
                        ->required()
                        ->columnSpan(2),
                    Select::make('mediatype_id')
                        ->label('Tipo de medio')
                        ->options(Mediatype::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->columnSpan(2),
                    Toggle::make('status')
                        ->label('Disponibilidad')
                        ->required()
                        ->onColor('success')
                        ->offColor('danger')
                        ->inline(false)
                        ->columnSpan(1),
                    TextInput::make('traffic_flow')->label('Flujo vehícular')->columnSpan(2),
                    Select::make('lighting')
                        ->label('Iluminación')
                        ->options([
                            'Externa' => 'Externa',
                            'Incluye' => 'Incluye',
                            'N/A' => 'N/A',
                            'S/I' => 'S/I',
                        ])->columnSpan(2),
                ])->columns(5),
                Section::make('Multimedia')->schema([
                    FileUpload::make('gallery')
                        ->multiple()
                        ->directory('media')
                        ->label('Galería de medios')
                        ->preserveFilenames()
                        ->image()
                        ->panelLayout('grid'),
                ]),
                Section::make('Ubicación detallada')->schema([
                    Select::make('department_id')
                        ->label('Departamento')
                        ->reactive()
                        //->required()
                        ->options(Department::pluck('name', 'id'))
                        ->columnSpan(1),
                    Select::make('municipality_id')
                        ->label('Municipio')
                        ->reactive()
                        //->required()
                        ->options(fn (Get $get) => Municipality::where('department_id', (int) $get('department_id'))->pluck('name', 'id'))
                        ->searchable()
                        ->columnSpan(1),
                    Select::make('district_id')
                        ->label('Distrito')
                        ->options(fn (Get $get) => District::where('municipality_id', (int) $get('municipality_id'))->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->columnSpan(1),
                    Textarea::make('address')->label('Dirección')->columnSpan(3)->required(),
                    /**LocationPickr::make('location')
                        ->label('Locación')
                        ->mapControls([
                            'mapTypeControl' => true,
                            'scaleControl' => true,
                            'streetViewControl' => true,
                            'rotateControl' => true,
                            'fullscreenControl' => true,
                            'zoomControl' => false,
                        ])
                        ->myLocationButtonLabel('Mapa')
                        ->defaultZoom(5)
                        ->draggable()
                        ->clickable()
                        ->defaultLocation([13.677066932239907, -89.19176963659241])
                        ->columnSpan(3), */
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
                TextColumn::make('code')->label('Código')->searchable(),
                IconColumn::make('status')
                    ->boolean()
                    ->label('Disponibilidad')
                    ->tooltip(fn (Model $record) => $record->status ? 'Disponible' : 'Medio vendido')
                    ->falseIcon('far-circle-xmark')
                    ->trueIcon('far-circle-check')
                    ->trueColor('success')
                    ->falseColor('warning'),
                TextColumn::make('address')->label('Dirección'),
                TextColumn::make('mediatype.name')->label('Tipo de medio'),
                TextColumn::make('district.name')->label('Distrito'),
                ColumnGroup::make('Medidas', [
                    TextColumn::make('width')->label('Ancho'),
                    TextColumn::make('height')->label('Alto'),
                ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('district')
                    ->label('Distrito')
                    ->searchable()
                    ->relationship('district', 'name')
                    ->options(District::pluck('name', 'id')),
                Tables\Filters\SelectFilter::make('mediatype')
                    ->label('Tipo de medio')
                    ->relationship('mediatype', 'name')
                    ->options(Mediatype::pluck('name', 'id')),
            ])
            ->actions([
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
            'index' => Pages\ListExternalmedia::route('/'),
            'create' => Pages\CreateExternalmedia::route('/create'),
            'edit' => Pages\EditExternalmedia::route('/{record}/edit'),
        ];
    }
}
