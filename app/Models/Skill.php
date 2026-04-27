<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'proficiency', 'icon', 'type'];

    const TYPE_TECHNICAL = 'technical';
    const TYPE_GENERAL = 'general';

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }
    
    protected $casts = [
        'name' => 'array',
    ];

    public function getTrans($field)
    {
        $data = $this->$field;
        if (!is_array($data)) return $data;
        return $data[app()->getLocale()] ?? $data['ar'] ?? '';
    }
}
