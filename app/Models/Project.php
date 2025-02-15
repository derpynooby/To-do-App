<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    // Adding factory for testing
    use HasFactory;

    /**
     * Adding mass assignment
     * Set of fillable fields
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'deadline',
        'status',
        'priority',
    ];

    /**
     * Adding guard
     * Set of guarded fields
     * @var array
     */
    protected $guarded = ['id'];


    /**
     * Get all of the tasks for the Project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
