<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ad extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:10|unique:ads,title',
            'cover_image' => ['required', 'url'],
            'introduction' => ['required', 'min:20'],
            'content' => ['required', 'min:100'],
            'rooms' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'images.*.url' => ['sometimes','required','url'],
            'images.*.caption' => ['sometimes','required','string']
        ];
    }
}
