<?php

namespace App\Filament\Resources\LegalEntities\Pages;

use App\Filament\Resources\LegalEntities\LegalEntityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLegalEntities extends ListRecords
{
    protected static string $resource = LegalEntityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
