<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminNewsEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:5',
                'max:55',
                Rule::unique('news', 'title')->ignore($this->id)
            ],
            'text' => 'required',
            'description' => 'required|max:255',
            'is_active' => 'boolean',
            'categories_id' => 'required|exists:categories,id',
            'publication_date' => 'required|date'
        ];
    }
}
