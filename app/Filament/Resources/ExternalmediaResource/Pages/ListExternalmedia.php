<?php

namespace App\Filament\Resources\ExternalmediaResource\Pages;

use App\Filament\Resources\ExternalmediaResource;
use App\Imports\MediaImport;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Collection;

class ListExternalmedia extends ListRecords
{
    protected static string $resource = ExternalmediaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ExcelImportAction::make()
                //->slideOver()
                ->use(MediaImport::class)
                ->color('warning')
                ->label('Importar'),
            Actions\CreateAction::make(),
        ];
    }
}
