<?php

namespace App\Filament\Resources\ExternalmediaResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Resources\RelationManagers\RelationManager;

class MediaDocumentsRelationManager extends RelationManager
{
    protected static string $relationship = 'mediaDocuments';

    protected static ?string $recordTitleAttribute = 'document_name';

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('document_type')->label('Tipo'),
                Tables\Columns\TextColumn::make('document_name')->label('Nombre'),
                Tables\Columns\TextColumn::make('issued_at')->label('Emitido')->date(),
                Tables\Columns\TextColumn::make('expires_at')->label('Vence')->date()
                    ->badge()
                    ->color(fn ($record) =>
                        $record->isExpired() ? 'danger' :
                        ($record->isAboutToExpire() ? 'warning' : 'success')
                    ),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
