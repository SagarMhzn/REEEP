<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KnowledgeRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'source' => 'nullable|url',
            'documents' => 'nullable|mimes:pdf,xlxs,xlx,docx,doc,csv,txt|max:50000',
        ];
    }
}
