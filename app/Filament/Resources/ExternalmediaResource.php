<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExternalmediaResource\Pages;
use App\Models\Department;
use App\Models\District;
use App\Models\Externalmedia;
use App\Models\Mediatype;
use App\Models\Municipality;
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
                        ->options(Department::pluck('name', 'id')),
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
                Section::make('Coordenadas')->schema([
                    TextInput::make('')->label('Ancho'),
                    TextInput::make('height')->label('Alto'),
                ])->columns(2),
                Section::make('Multimedia')->schema([
                    FileUpload::make('gallery')->multiple()->directory('media')->preserveFilenames()->uploadingMessage('Subiendo...')->panelLayout('grid'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->label('Código')->searchable(),
                IconColumn::make('status')->boolean()->label('Disponibilidad')
                    ->tooltip(fn (Model $record) => $record->status ? 'Disponible' : 'Medio vendido'),
                Tables\Columns\TextColumn::make('address')->label('Dirección'),
                Tables\Columns\TextColumn::make('mediatype.name')->label('Tipo de medio'),
                Tables\Columns\TextColumn::make('district.name')->label('Distrito'),
                ColumnGroup::make('Medidas', [
                    Tables\Columns\TextColumn::make('width')->label('Ancho'),
                    Tables\Columns\TextColumn::make('height')->label('Alto'),
                ]),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('mediatype')
                    ->label('Tipo de medio')
                    ->relationship('mediatype', 'name'),
                Tables\Filters\SelectFilter::make('district')
                    ->label('Distrito')
                    ->searchable()
                    ->relationship('district', 'name'),
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
            'index' => Pages\ListExternalmedia::route('/'),
            'create' => Pages\CreateExternalmedia::route('/create'),
            'edit' => Pages\EditExternalmedia::route('/{record}/edit'),
        ];
    }
}
