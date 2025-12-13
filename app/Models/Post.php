<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'meta_title',
        'meta_description',
        'is_published',
        'published_at',
        'user_id',
        'related_project_id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'title' => 'array', // If we migrate existing data later
        'content' => 'array',
        'excerpt' => 'array',
    ];

    public function relatedProject()
    {
        return $this->belongsTo(Project::class, 'related_project_id');
    }

    public function getTrans($field)
    {
        $data = $this->$field;
        if (!is_array($data)) {
             // Fallback for existing string data
             // If field is truly a string in DB but cast to array, Laravel might return specific structure or error?
             // Actually if cast is 'array' and DB has "My Title", Laravel returns ["My Title"] or error depending on JSON validity.
             // We'll handle that robustness later.
             return $data; 
        }
        return $data[app()->getLocale()] ?? $data['ar'] ?? '';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
