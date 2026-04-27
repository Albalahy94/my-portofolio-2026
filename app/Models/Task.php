<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'priority', 'due_date', 'assigned_to', 'position', 'attachments', 'links'];

    protected $casts = [
        'attachments' => 'array',
        'links' => 'array',
    ];

    /**
     * Get the user that the task is assigned to.
     */
    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
