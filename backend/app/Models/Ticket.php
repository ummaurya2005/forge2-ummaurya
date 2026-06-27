<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * Mass Assignable Attributes
     */
    protected $fillable = [
        'organization_id',
        'customer_id',
        'assigned_to',
        'title',
        'description',
        'category',
        'priority',
        'status',
        'attachment',
        'due_date',
        'closed_at',
    ];

    /**
     * Attribute Casting
     */
    protected function casts(): array
    {
        return [
            'due_date' => 'datetime',
            'closed_at' => 'datetime',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Ticket belongs to an Organization
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Customer who created the ticket
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Assigned Agent
     */
    public function assignedAgent()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Ticket has many comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Ticket has many activity logs
     */
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}