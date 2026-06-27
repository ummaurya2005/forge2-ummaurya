<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'ticket_id' => $this->ticket_id,

            'user' => [

                'id' => $this->user?->id,

                'name' => $this->user?->name,

                'email' => $this->user?->email,

            ],

            'message' => $this->message,

            'is_internal' => $this->is_internal,

            'attachment' => $this->attachment,

            'created_at' => $this->created_at,

        ];
    }
}