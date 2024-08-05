<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sort_by' => 'nullable|in:full_name,active,last_activity_at',
            'sort_direction' => 'nullable|in:asc,desc',
            'name' => 'nullable|string',
            'active' => 'nullable|boolean',
            'activity_from' => 'nullable|date',
            'activity_to' => 'nullable|date',
            'per_page' => 'nullable|integer',
        ];
    }
}
