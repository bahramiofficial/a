<?php

namespace App\Http\Requests\Ide;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:50|string',
            'family'=>'required|max:100|string',
            'born_at'=>'required',
            'roleGroup'=>'required',
            'Orientation'=>'required',
        ];

    }
}
