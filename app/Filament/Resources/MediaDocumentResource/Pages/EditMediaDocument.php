<?php

namespace App\Filament\Resources\MediaDocumentResource\Pages;

use App\Filament\Resources\MediaDocumentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaDocument extends EditRecord
{
    protected static string $resource = MediaDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
