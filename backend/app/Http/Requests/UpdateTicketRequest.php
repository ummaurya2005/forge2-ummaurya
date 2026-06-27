<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation Rules
     */
    public function rules(): array
    {
        return [

            'organization_id' => 'required|exists:organizations,id',

            'user_id' => 'required|exists:users,id',

            'subject' => 'required|string|max:255',

            'description' => 'required|string',

            'priority' => 'required|in:Low,Medium,High,Critical',

            'status' => 'required|in:Open,In Progress,Resolved,Closed',

            'assigned_to' => 'nullable|exists:users,id',

        ];
    }

    /**
     * Custom Validation Messages
     */
    public function messages(): array
    {
        return [

            'organization_id.required' => 'Organization is required.',
            'organization_id.exists' => 'Selected organization does not exist.',

            'user_id.required' => 'User is required.',
            'user_id.exists' => 'Selected user does not exist.',

            'subject.required' => 'Subject is required.',

            'description.required' => 'Description is required.',

            'priority.required' => 'Priority is required.',
            'priority.in' => 'Priority must be Low, Medium, High or Critical.',

            'status.required' => 'Status is required.',
            'status.in' => 'Invalid ticket status.',

            'assigned_to.exists' => 'Assigned user does not exist.',
        ];
    }
}