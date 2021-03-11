<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
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
            'country' => 'required',
            'address' => 'required',
            'Phone' => 'required',
            'email' => 'required |email',
            'lat' => 'required',
            'lng' => 'required',
            'meta_title' => 'required',
            'meta_desc' => 'required',
            'meta_keywords' => 'required',
        ];
    }
}
