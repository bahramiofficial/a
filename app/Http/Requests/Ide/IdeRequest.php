<?php

namespace App\Http\Requests\Ide;

use Illuminate\Foundation\Http\FormRequest;

class IdeRequest extends FormRequest
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
                'name' => 'required|max:50|string',
                'family' => 'required|max:100|string',
                'numberId' => 'required|numeric',
                'nationalCode' => 'required|numeric|min:10',
                'born_at' => 'required',
                'phone' => 'numeric',
                'maritalStatus' => 'numeric|max:1',
                'gender' => 'max:1',
                'militaryService' => 'required',
                'nationality' => 'required|max:50',
                'mobile' => 'numeric',
                'religion'=>'required',
                //
                'startupname'=>'required|string',
                'startupdesc'=>'required|string',
                'startupproblem'=>'required|string',
                'startupfounders'=>'required|string',
                'startupcustomer'=>'required|string',
                'startuprival'=>'required|string',
                'startupsocialnetwork'=>'required|string',
                'startupusersupport'=>'required|string',
            ];

    }
}
