<?php

namespace App\Filament\Resources\SaleResource\Pages;

use App\Filament\Resources\SaleResource;
use Filament\Resources\Pages\EditRecord;

class EditSale extends EditRecord
{
    protected static string $resource = SaleResource::class;

    protected int $externalmediaToAttach;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->externalmediaToAttach = $data['externalmedias'];
        unset($data['externalmedias']);

        return $data;
    }

    protected function afterSave(): void
    {
        $this->record->externalmedias()->sync([$this->externalmediaToAttach]);
    }

   protected function fillForm(): void
{
    parent::fillForm();

    // Solucionar ambigüedad especificando la tabla
    $externalmediaId = $this->record
        ->externalmedias()
        ->select('externalmedia.id') // 👈 especificar tabla
        ->pluck('externalmedia.id')  // 👈 especificar tabla aquí también
        ->first();

    $this->form->fill([
        'externalmedias' => $externalmediaId,
    ]);
}

}
