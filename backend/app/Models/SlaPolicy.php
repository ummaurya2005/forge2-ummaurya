<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlaPolicy extends Model
{
    use HasFactory;

    /**
     * Mass Assignable Attributes
     */
    protected $fillable = [
        'organization_id',
        'name',
        'priority',
        'response_time',
        'resolution_time',
        'is_active',
    ];

    /**
     * Attribute Casting
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * SLA Policy belongs to an Organization
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}