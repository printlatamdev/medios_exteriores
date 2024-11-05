<?php

namespace App\Filament\Resources\ExternalmediaResource\Pages;

use App\Filament\Resources\ExternalmediaResource;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Imports\MediaImport;

class ListExternalmedia extends ListRecords
{
    protected static string $resource = ExternalmediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            ExcelImportAction::make()
                ->slideOver()
                ->use(MediaImport::class)
                ->color("warning")
                ->label('Importar'),
        ];
    }
}
