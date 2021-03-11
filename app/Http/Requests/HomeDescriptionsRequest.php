<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeDescriptionsRequest extends FormRequest
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
            'title' => 'required |max:250',
            'description' => 'required|String',
            'summary' => 'required |String',
            'link' => 'required |unique:homedescriptions',
            'images1' => 'required|mimes:jpeg,png,bmp,gif,svg',
            'images2' => 'required|mimes:jpeg,png,bmp,gif,svg',
            'images3' => 'required|mimes:jpeg,png,bmp,gif,svg',
            'type' => 'required',
            'meta_desc' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
        ];}
        return [
            'title' => 'required |max:250',
            'description' => 'required|String',
            'summary' => 'required |String',
            'link' => 'required',
            'type' => 'required',
            'meta_desc' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
        ];
    }
}
