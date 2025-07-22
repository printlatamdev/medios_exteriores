<?php

namespace App\Filament\Resources\MediaDocumentResource\Pages;

use App\Filament\Resources\MediaDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMediaDocuments extends ListRecords
{
    protected static string $resource = MediaDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): Builder
    {
        // Eager loading para evitar N+1 y mejorar rendimiento
        return parent::getTableQuery()
            ->with('externalmedia');
    }
}
