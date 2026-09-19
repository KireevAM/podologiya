<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('legal_entity_id')
                    ->relationship('legalEntity', 'name'),
                TextInput::make('name')
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                Textarea::make('working_hours')
                    ->columnSpanFull(),
                TextInput::make('vk'),
                TextInput::make('telegram')
                    ->tel(),
                TextInput::make('whatsapp'),
                TextInput::make('lat')
                    ->numeric(),
                TextInput::make('lng')
                    ->numeric(),
                TextInput::make('seo_title'),
                Textarea::make('seo_description')
                    ->columnSpanFull(),
                TextInput::make('seo_h1'),
                Textarea::make('intro_text')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
