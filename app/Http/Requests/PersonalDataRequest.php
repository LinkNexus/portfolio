<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalDataRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
            'location' => ['nullable', 'string'],
            'linkedin' => ['required', 'string'],
            'github' => ['required', 'string'],
            'speech' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'workExperience' => ['json'],
            'skills' => ['json'],
            'projects' => ['json'],
            'education' => ['json'],
        ];
    }
}
