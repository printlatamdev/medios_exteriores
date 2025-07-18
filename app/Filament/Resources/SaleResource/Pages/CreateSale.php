<?php

namespace App\Filament\Resources\SaleResource\Pages;

use App\Filament\Resources\SaleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSale extends CreateRecord
{
    protected static string $resource = SaleResource::class;

    // 🔁 Variable temporal para guardar el medio seleccionado
    protected int $externalmediaToAttach;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Extraemos el ID del medio externo y lo quitamos del array para evitar error de columna inexistente
        $this->externalmediaToAttach = $data['externalmedias'];
        unset($data['externalmedias']);

        return $data;
    }

    protected function afterCreate(): void
    {
        // Asignamos el medio externo seleccionado a través de la relación many-to-many
        $this->record->externalmedias()->sync([$this->externalmediaToAttach]);
    }
}
