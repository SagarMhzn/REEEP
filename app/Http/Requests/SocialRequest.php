<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'network_title.*' => 'required|string',
            'source_url.*' => 'required|url',
            'slug.*' => 'nullable|string',
        ];

        if ($this->isMethod('PUT')) {
            $rules = [
                'network_title.*' => [
                    'string',
                    Rule::unique('socials')->ignore($this->route('id')),
                ],
            ];
        }
        return $rules;
    }
}
