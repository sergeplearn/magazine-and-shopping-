<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostproductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'sometimes|file|image|max:5000',

        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'body.required' => 'message is required',
        ];
    }
}
