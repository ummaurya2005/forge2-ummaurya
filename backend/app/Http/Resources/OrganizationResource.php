<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'name' => $this->name,

            'slug' => $this->slug,

            'logo' => $this->logo,

            'email' => $this->email,

            'phone' => $this->phone,

            'website' => $this->website,

            'address' => $this->address,

            'city' => $this->city,

            'state' => $this->state,

            'country' => $this->country,

            'postal_code' => $this->postal_code,

            'is_active' => (bool) $this->is_active,

            'created_at' => $this->created_at?->toDateTimeString(),

            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}