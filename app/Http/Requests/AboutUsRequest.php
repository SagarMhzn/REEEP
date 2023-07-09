<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
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
            'title.en' => 'required|string',
            'title.ne' => 'required|string',
            'description.en' => 'required|string',
            'description.ne' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:20000'
        ];
    }
}
