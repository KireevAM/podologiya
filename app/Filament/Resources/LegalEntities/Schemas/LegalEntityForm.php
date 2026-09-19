<?php

namespace App\Filament\Resources\LegalEntities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LegalEntityForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('inn'),
                TextInput::make('ogrn'),
                TextInput::make('kpp'),
                TextInput::make('legal_address'),
                Toggle::make('is_default')
                    ->required(),
            ]);
    }
}
