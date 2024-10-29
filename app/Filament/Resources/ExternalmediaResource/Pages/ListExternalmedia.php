<?php

namespace App\Filament\Resources\ExternalmediaResource\Pages;

use App\Filament\Resources\ExternalmediaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExternalmedia extends ListRecords
{
    protected static string $resource = ExternalmediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
