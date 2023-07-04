<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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

        $rule1 = [
            'cover_image' => 'nullable|image|mimes:jpeg,png,gif|max:20000',            
        ];

        if ($this->isMethod('POST')) {
            $rule2 = [
                'title' => 'string|unique:albums',
            ];
        } elseif ($this->isMethod('PUT')) {
            $rule2 = [
                'title' => [
                    'string',
                    Rule::unique('albums')->ignore($this->route('id')),
                ],
            ];
        }

        $combinedRules = array_merge($rule1, $rule2);
        return $combinedRules ?? [];
    }
}
