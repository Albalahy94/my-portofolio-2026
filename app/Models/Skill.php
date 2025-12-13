<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = ['name', 'proficiency', 'icon'];
    
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
