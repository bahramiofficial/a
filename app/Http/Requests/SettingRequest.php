<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'educationalpack' => 'required',
                'educationalarticles' => 'required',
                'ebook' => 'required',
                'podcast' => 'required',
                'newsarticles' => 'required',
                'khabarname' => 'required',
                'img' => 'required',
                'cooperation' => 'required',
                'voicebook' => 'required',
                'latest' => 'required',
                'usualquestions' => 'required',
                'acceptidea' => 'required',
                'logo' => 'required |mimes:jpeg,png,bmp',
                'title' => 'required',
                'homedesctop' => 'required',
                'worksection' => 'required',
                'dep' => 'required',
                'article' => 'required',
                'homedescdown' => 'required',
                'ourresources' => 'required',
                'instagram' => 'required',
                'coleagesuggecstions' => 'required',
                'contactus' => 'required',
            ];
        }
        return [
            'educationalpack' => 'required',
            'educationalarticles' => 'required',
            'ebook' => 'required',
            'podcast' => 'required',
            'newsarticles' => 'required',
            'khabarname' => 'required',
            'img' => 'required',
            'cooperation' => 'required',
            'voicebook' => 'required',
            'latest' => 'required',
            'usualquestions' => 'required',
            'acceptidea' => 'required',
            'title' => 'required',
            'homedesctop' => 'required',
            'worksection' => 'required',
            'dep' => 'required',
            'article' => 'required',
            'homedescdown' => 'required',
            'ourresources' => 'required',
            'instagram' => 'required',
            'coleagesuggecstions' => 'required',
            'contactus' => 'required',
        ];
    }
}
