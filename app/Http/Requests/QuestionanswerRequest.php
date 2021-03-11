<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionanswerRequest extends FormRequest
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
            'why' => 'required|max:250',
            'benefit' => 'required|max:250',
            'hours' => 'required|max:250',
            'lessonG' => 'required|max:250',
            'lessonInfo' => 'required|max:250',

            'cwhy' => 'required',
            'cbenefit' => 'required',
            'clessonG' => 'required',
            'chours' => 'required',
            'clessonInfo' => 'required',

            'meta_desc' => 'required|max:250',
            'meta_title' => 'required|max:250',
            'meta_keywords' => 'required|max:250',
        ];

    }
}
