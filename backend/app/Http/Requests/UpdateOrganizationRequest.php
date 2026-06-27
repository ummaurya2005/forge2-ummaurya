<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationRequest extends FormRequest
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
        $organizationId = $this->route('organization');

        if (is_object($organizationId)) {
            $organizationId = $organizationId->id;
        }

        return [

            'name' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255|unique:organizations,slug,' . $organizationId,

            'logo' => 'nullable|string|max:255',

            'email' => 'required|email|unique:organizations,email,' . $organizationId,

            'phone' => 'nullable|string|max:20',

            'website' => 'nullable|url|max:255',

            'address' => 'nullable|string',

            'city' => 'nullable|string|max:100',

            'state' => 'nullable|string|max:100',

            'country' => 'nullable|string|max:100',

            'postal_code' => 'nullable|string|max:20',

            'is_active' => 'boolean',
        ];
    }

    /**
     * Custom Validation Messages
     */
    public function messages(): array
    {
        return [

            'name.required' => 'Organization name is required.',

            'email.required' => 'Organization email is required.',

            'email.email' => 'Please enter a valid email.',

            'email.unique' => 'Organization email already exists.',

            'website.url' => 'Please enter a valid website URL.',
        ];
    }
}