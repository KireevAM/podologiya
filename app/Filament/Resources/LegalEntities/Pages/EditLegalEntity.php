<?php

namespace App\Filament\Resources\LegalEntities\Pages;

use App\Filament\Resources\LegalEntities\LegalEntityResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditLegalEntity extends EditRecord
{
    protected static string $resource = LegalEntityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
