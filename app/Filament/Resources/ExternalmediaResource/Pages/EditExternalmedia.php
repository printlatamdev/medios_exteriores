<?php

namespace App\Filament\Resources\ExternalmediaResource\Pages;

use App\Filament\Resources\ExternalmediaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExternalmedia extends EditRecord
{
    protected static string $resource = ExternalmediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
