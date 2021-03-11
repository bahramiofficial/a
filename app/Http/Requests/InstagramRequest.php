<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstagramRequest extends FormRequest
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
        if($this->method() == 'POST') {
        return [
            'title' => 'required|max:250',
            'link' => 'required',
            'images' => 'required|mimes:jpeg,png,bmp,gif,svg',
            'meta_desc' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
        ];}

        return [
            'title' => 'required|max:250',
            'link' => 'required',

            'meta_desc' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
        ];
    }
}





