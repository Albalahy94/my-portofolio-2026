<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'content' => 'array',
        'technologies' => 'array',
        'links' => 'array',
    ];

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function relatedPost()
    {
        return $this->belongsTo(Post::class, 'related_post_id');
    }

    /**
     * Helper to get translated field safely
     */
    public function getTrans($field)
    {
        $data = $this->$field;
        if (!is_array($data)) return $data;
        return $data[app()->getLocale()] ?? $data['ar'] ?? '';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
