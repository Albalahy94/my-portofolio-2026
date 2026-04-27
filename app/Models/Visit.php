<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'url',
        'method',
        'referer',
        'user_agent',
        'country_code',
        'country_name',
        'city',
        'device',
        'browser',
        'platform',
        'is_bot',
    ];

    protected $casts = [
        'is_bot' => 'boolean',
    ];

    /**
     * Scope for non-bot visits.
     */
    public function scopeReal($query)
    {
        return $query->where('is_bot', false);
    }
}
