<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaDocumentResource\Pages;
use App\Models\MediaDocument;
use App\Models\Externalmedia;
use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MediaDocumentResource extends Resource
{
    protected static ?string $model = MediaDocument::class;

    protected static ?string $navigationGroup = 'Administración';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $modelLabel = 'Documento';
    protected static ?string $pluralModelLabel = 'Documentos Legales';

    // use Filament\Forms\Get;
// use Filament\Forms\Set;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('externalmedia_id')
                ->label('Medio')
                ->relationship('externalmedia', 'code')
                ->getOptionLabelFromRecordUsing(fn($record) => "{$record->code} - {$record->address}")
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('document_type')
                ->label('Tipo de documento')
                ->required(),

            Forms\Components\TextInput::make('document_name')
                ->label('Nombre del documento')
                ->required(),

            Forms\Components\DatePicker::make('issued_at')
                ->label('Fecha de emisión')
                ->disabled(fn(Get $get) => $get('no_expiry')),

            Forms\Components\Toggle::make('no_expiry')
                ->label('Sin fecha de vencimiento')
                ->default(false)
                ->reactive()
                ->afterStateUpdated(function (bool $state, Set $set) {
                    if ($state) {
                        $set('expires_at', null); // limpia el campo si se activa sin vencimiento
                    }
                }),

            Forms\Components\DatePicker::make('expires_at')
                ->label('Fecha de vencimiento')
                ->visible(fn(Get $get) => !$get('no_expiry'))
                ->reactive(),

            Forms\Components\FileUpload::make('file_path')
                ->label('Archivo')
                ->directory('media-documents')
                ->preserveFilenames(),

            Forms\Components\Textarea::make('notes')
                ->label('Notas')
                ->rows(3),
        ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('externalmedia.code')->label('Medio'),
                TextColumn::make('document_type')->label('Tipo'),
                TextColumn::make('document_name')->label('Nombre'),
                TextColumn::make('issued_at')->label('Emitido')->date(),
                TextColumn::make('expires_at')
                    ->label('Vence')
                    ->badge()
                    ->color(
                        fn($record) =>
                        $record->isExpired() ? 'danger' :
                        ($record->isAboutToExpire() ? 'warning' : 'success')
                    )
                    ->date(),
                IconColumn::make('file_path')
                    ->label('Archivo')
                    ->boolean(fn($record) => !empty($record->file_path)),
            ])->filters([
                    Tables\Filters\SelectFilter::make('document_type')
                        ->label('Tipo de documento')
                        ->options(
                            fn() => MediaDocument::query()
                                ->select('document_type')
                                ->distinct()
                                ->pluck('document_type', 'document_type')
                        )
                        ->searchable(),

                    Tables\Filters\SelectFilter::make('externalmedia_id')
                        ->label('Medio exterior')
                        ->relationship('externalmedia', 'code'),

                    Tables\Filters\Filter::make('vencido')
                        ->label('Solo vencidos')
                        ->query(fn($query) => $query->whereDate('expires_at', '<', now())),

                    Tables\Filters\Filter::make('sin_vencimiento')
                        ->label('Sin fecha de vencimiento')
                        ->query(fn($query) => $query->where('no_expiry', true)),

                    Tables\Filters\Filter::make('emitidos_recientemente')
                        ->label('Emitidos en últimos 30 días')
                        ->query(fn($query) => $query->where('issued_at', '>=', now()->subDays(30))),
                ])

            ->actions([
                Action::make('ver_archivo')
                    ->icon('heroicon-o-eye')
                    ->tooltip('Ver archivo PDF')
                    ->color('info')
                    ->iconButton()
                    ->modalHeading('Visualizar documento')
                    ->modalSubheading(fn($record) => $record->document_name)
                    ->modalContent(fn($record) => view('components.modal-pdf-preview', [
                        'url' => $record->file_path ? Storage::url($record->file_path) : null,
                    ]))
                    ->modalSubmitAction(false)
                    ->hidden(fn($record) => empty($record->file_path)),

                Action::make('descargar_documentos')
                    ->label('PDF combinado')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->tooltip('Descargar todos los documentos legales en un solo PDF')
                    ->color('gray')
                    ->iconButton()
                    ->action(function ($record) {
                        $pdf = new Fpdi();

                        // Asegúrate de que el $record sea un MediaDocument y esté cargado con su Externalmedia
                        $externalMedia = $record->externalmedia;

                        $documentos = $externalMedia?->mediaDocuments()->whereNotNull('file_path')->get() ?? collect();

                        foreach ($documentos as $documento) {
                            $filePath = storage_path('app/' . $documento->file_path);


                            if (file_exists($filePath)) {
                                $pageCount = $pdf->setSourceFile($filePath);

                                for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                                    $templateId = $pdf->importPage($pageNo);
                                    $size = $pdf->getTemplateSize($templateId);

                                    $pdf->AddPage($size['orientation'], [$size['width'], $size['height']]);
                                    $pdf->useTemplate($templateId);
                                }
                            }
                        }

                        $tempFile = storage_path("app/public/merged_docs_{$externalMedia->code}.pdf");
                        $pdf->Output($tempFile, 'F');

                        return response()->download($tempFile)->deleteFileAfterSend();
                    })
                    ->visible(fn($record) => $record->externalmedia?->mediaDocuments()->exists()),

                Action::make('edit')
                    ->icon('heroicon-o-pencil')
                    ->tooltip('Editar documento')
                    ->url(fn($record) => route('filament.admin.resources.media-documents.edit', ['record' => $record]))
                    ->iconButton(),

                Action::make('delete')
                    ->icon('heroicon-o-trash')
                    ->tooltip('Eliminar documento')
                    ->requiresConfirmation()
                    ->color('danger')
                    ->action(fn($record) => $record->delete())
                    ->iconButton(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMediaDocuments::route('/'),
            'create' => Pages\CreateMediaDocument::route('/create'),
            'edit' => Pages\EditMediaDocument::route('/{record}/edit'),
            'view' => Pages\ViewMediaDocument::route('/{record}'), // ✅ Asegúrate de tener esto
        ];
    }


}
