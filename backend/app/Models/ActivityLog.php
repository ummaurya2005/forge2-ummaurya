<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    /**
     * Mass Assignable Attributes
     */
    protected $fillable = [
        'ticket_id',
        'user_id',
        'action',
        'description',
        'properties',
    ];

    /**
     * Attribute Casting
     */
    protected function casts(): array
    {
        return [
            'properties' => 'array',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Activity belongs to a Ticket
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Activity performed by a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}   