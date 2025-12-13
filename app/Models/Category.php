<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    
    protected $casts = [
        'name' => 'array',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getTrans($field)
    {
        $data = $this->$field;
        if (!is_array($data)) return $data;
        return $data[app()->getLocale()] ?? $data['ar'] ?? '';
    }
}
