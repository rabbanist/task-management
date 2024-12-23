<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'project_id',
        'assign_to'
    ];

    public function assign()
    {
        return $this->belongsTo(User::class, 'assign_to');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
