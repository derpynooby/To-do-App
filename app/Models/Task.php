<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    /**
     * Adding mass assignment.
     * Set of fillable fields.
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'project_id',
    ];

    /**
     * Adding guard
     * Set of guarded fields
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the project that owns the task.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project():BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
