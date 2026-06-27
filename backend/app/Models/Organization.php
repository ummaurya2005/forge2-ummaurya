<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'email',
        'phone',
        'website',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'is_active',
    ];

    /**
     * Organization has many users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Organization has many tickets.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Organization has many SLA policies.
     */
    public function slaPolicies()
    {
        return $this->hasMany(SlaPolicy::class);
    }
}