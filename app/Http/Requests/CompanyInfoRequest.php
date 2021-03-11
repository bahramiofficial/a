<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyInfoRequest extends FormRequest
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
            'humanresourse' => 'required|string',
            'year' => 'required|string',
            'customercompetition' => 'required|string',
            'ongoingproject' => 'required|string',
            'projectdone' => 'required|string',
        ];
    }
}
