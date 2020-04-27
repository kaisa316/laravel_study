<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckMobile extends FormRequest
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
            'mobile' => 'required',
        ];
    }
    
    /**
     * @override
     *
     * @return void
     */
    public function messages()
    {
        return [
            'mobile.required' =>'手机号必填',
        ];   
    }
    
}
