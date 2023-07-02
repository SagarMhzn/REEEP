<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'caption' => 'nullable|string|max:150',
            'banner_file' => 'required|file|mimes:jpeg,png,gif,mp4,avi,mov|max:100240',
        ];

        if ($this->isMethod('POST')) {
            $rule2 = [
                'banner_order' => 'required|numeric|max:10|unique:banners',
            ];
        } elseif ($this->isMethod('PUT')) {
            $rule2 = [
                'banner_order' => [
                    'required',
                    'numeric',
                    Rule::unique('banners')->ignore($this->route('id')),
                    'max:10'
                ],
            ];
        }

        $combinedRules = array_merge($rule1, $rule2);
        return $combinedRules ?? [];



        // return [
        //     'title' => 'required|string|max:50',
        //     'caption' => 'nullable|string|max:150',
        //     'banner_file' => 'required|file|mimes:jpeg,png,gif,mp4,avi,mov|max:100240',
        //     'banner_order' => 'required|numeric|max:10',
        //     // 'banner_file' => 'image|mimes:jpeg,png,gif|max:20000'
        // ];
    }
}
