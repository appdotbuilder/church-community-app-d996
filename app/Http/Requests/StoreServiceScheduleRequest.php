<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceScheduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()?->isAdmin() ?? false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:sunday,group,youth,children,womens,mens,elderly',
            'location' => 'nullable|string|max:255',
            'scheduled_at' => 'required|date',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Service title is required.',
            'type.required' => 'Service type is required.',
            'type.in' => 'Please select a valid service type.',
            'scheduled_at.required' => 'Schedule date and time is required.',
            'scheduled_at.date' => 'Please provide a valid date and time.',
        ];
    }
}