<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'organization' => [
                'id' => $this->organization?->id,
                'name' => $this->organization?->name,
            ],

            'customer' => [
                'id' => $this->customer?->id,
                'name' => $this->customer?->name,
                'email' => $this->customer?->email,
            ],

            'assigned_agent' => $this->assignedAgent
                ? [
                    'id' => $this->assignedAgent->id,
                    'name' => $this->assignedAgent->name,
                    'email' => $this->assignedAgent->email,
                ]
                : null,

            'title' => $this->title,

            'description' => $this->description,

            'category' => $this->category,

            'priority' => $this->priority,

            'status' => $this->status,

            'attachment' => $this->attachment,

            'due_date' => $this->due_date,

            'closed_at' => $this->closed_at,

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at,

        ];
    }
}