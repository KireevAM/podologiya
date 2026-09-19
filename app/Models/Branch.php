<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    protected $fillable = [
        'legal_entity_id', 'name', 'city', 'slug', 'address', 'phone', 'email',
        'working_hours', 'vk', 'telegram', 'whatsapp', 'lat', 'lng',
        'seo_title', 'seo_description', 'seo_h1', 'intro_text', 'is_active',
    ];

    protected $casts = [
        'working_hours' => 'array',
        'is_active' => 'boolean',
    ];

    public function legalEntity(): BelongsTo
    {
        return $this->belongsTo(LegalEntity::class);
    }

    public function getLegalEntityOrDefault(): ?LegalEntity
    {
        return $this->legalEntity ?? LegalEntity::default();
    }

    public function getSeoTitle(): string
    {
        return $this->seo_title ?: "Подология {$this->city} — филиал {$this->name}";
    }

    public function getSeoDescription(): string
    {
        return $this->seo_description
            ?: "{$this->name} — филиал сети подологических клиник в {$this->city}. "
             . "Адрес: {$this->address}. Телефон: {$this->phone}. Записывайтесь онлайн!";
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
