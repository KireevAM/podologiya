<?php

namespace App\Filament\Resources\LegalEntities\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class LegalEntityInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                TextEntry::make('inn')
                    ->placeholder('-'),
                TextEntry::make('ogrn')
                    ->placeholder('-'),
                TextEntry::make('kpp')
                    ->placeholder('-'),
                TextEntry::make('legal_address')
                    ->placeholder('-'),
                IconEntry::make('is_default')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
