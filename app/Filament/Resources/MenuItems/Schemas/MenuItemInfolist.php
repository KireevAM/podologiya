<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MenuItemInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('location'),
                TextEntry::make('parent.title')
                    ->label('Parent')
                    ->placeholder('-'),
                TextEntry::make('branch.name')
                    ->label('Branch')
                    ->placeholder('-'),
                TextEntry::make('title'),
                TextEntry::make('url'),
                TextEntry::make('icon')
                    ->placeholder('-'),
                IconEntry::make('open_in_new_tab')
                    ->boolean(),
                TextEntry::make('sort_order')
                    ->numeric(),
                IconEntry::make('is_active')
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
