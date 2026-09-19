<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BranchInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('legalEntity.name')
                    ->label('Legal entity')
                    ->placeholder('-'),
                TextEntry::make('name'),
                TextEntry::make('city'),
                TextEntry::make('slug'),
                TextEntry::make('address'),
                TextEntry::make('phone'),
                TextEntry::make('email')
                    ->label('Email address')
                    ->placeholder('-'),
                TextEntry::make('working_hours')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('vk')
                    ->placeholder('-'),
                TextEntry::make('telegram')
                    ->placeholder('-'),
                TextEntry::make('whatsapp')
                    ->placeholder('-'),
                TextEntry::make('lat')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('lng')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('seo_title')
                    ->placeholder('-'),
                TextEntry::make('seo_description')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('seo_h1')
                    ->placeholder('-'),
                TextEntry::make('intro_text')
                    ->placeholder('-')
                    ->columnSpanFull(),
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
