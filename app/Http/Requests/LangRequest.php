<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LangRequest extends FormRequest
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
        return [
            'title.en' => 'required|string|max:50',
            'title.ne' => 'required|string|max:50',
            'description.en' => 'required|string|max:255',
            'description.ne' => 'required|string|max:255',
        ];
    }
}
