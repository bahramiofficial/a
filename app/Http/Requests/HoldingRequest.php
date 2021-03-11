<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoldingRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'summary' => 'required',
            'subheadings' => 'required',
            'lang' => 'required',
            'meta_desc' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'link' => 'required',
            'images' => 'required|mimes:jpeg,png,bmp',
        ];
        }
        return [
            'title' => 'required',
            'description' => 'required',
            'summary' => 'required',
            'subheadings' => 'required',
            'lang' => 'required',
            'meta_desc' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'link' => 'required',
        ];
    }
}
