<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'parent_id' => 'nullable|numeric',
            'slug' => 'nullable|string',
            'status' => 'boolean|required',
            'order' => 'numeric|required',
        ];

        if ($this->isMethod('POST')) {
            $rule2 = [
                'title' => 'string|unique:menus|max:100',
            ];
        } elseif ($this->isMethod('PUT')) {
            $rule2 = [
                'title' => [
                    'string',
                    Rule::unique('menus')->ignore($this->route('id')),
                ],
            ];
        }

        $combinedRules = array_merge($rule1, $rule2);
        return $combinedRules ?? [];
    }
}
