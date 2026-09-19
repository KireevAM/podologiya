<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LegalEntity extends Model
{
    protected $fillable = [
        'name', 'inn', 'ogrn', 'kpp', 'legal_address', 'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public static function default(): ?self
    {
        return static::where('is_default', true)->first();
    }
}
