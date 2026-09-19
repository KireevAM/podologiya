<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'network_name', 'default_phone', 'default_email',
        'vk', 'telegram', 'whatsapp',
        'working_hours_default', 'footer_copyright',
    ];

    protected $casts = [
        'working_hours_default' => 'array',
    ];

    public static function current(): ?self
    {
        return static::first();
    }
}
