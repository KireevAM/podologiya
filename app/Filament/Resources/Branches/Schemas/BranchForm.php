<?php

namespace App\Filament\Resources\Branches\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Select;
use Filament\Schemas\Components\Textarea;
use Filament\Schemas\Components\TextInput;
use Filament\Schemas\Components\Toggle;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Основное')->schema([
                TextInput::make('name')->label('Название филиала')->required(),
                TextInput::make('city')->label('Город')->required(),
                TextInput::make('slug')->label('URL (латиница)')->required()->unique(ignoreRecord: true)
                    ->helperText('например: sankt-peterburg-nevskij'),
                TextInput::make('address')->label('Адрес')->required(),
                TextInput::make('phone')->label('Телефон')->tel()->required(),
                TextInput::make('email')->label('E-mail')->email(),
                Select::make('legal_entity_id')->label('Юрлицо (реквизиты в подвале)')
                    ->relationship('legalEntity', 'name')->nullable()
                    ->helperText('Пусто = реквизиты сети по умолчанию'),
            ])->columns(2),

            Section::make('Соцсети и часы работы')->schema([
                TextInput::make('vk')->label('ВКонтакте')->url(),
                TextInput::make('telegram')->label('Telegram'),
                TextInput::make('whatsapp')->label('WhatsApp'),
                Textarea::make('working_hours')->label('Часы работы (JSON)')
                    ->helperText('например: {"mon":"10:00-20:00","tue":"10:00-20:00"}'),
            ])->columns(2),

            Section::make('SEO')->schema([
                TextInput::make('seo_title')->label('SEO Title'),
                Textarea::make('seo_description')->label('SEO Description'),
                TextInput::make('seo_h1')->label('Заголовок H1'),
                Textarea::make('intro_text')->label('Текст-интро на странице филиала'),
            ]),

            Toggle::make('is_active')->label('Филиал активен')->default(true),
        ]);
    }
}
