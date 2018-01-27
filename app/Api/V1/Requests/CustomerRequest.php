<?php

namespace App\Api\V1\Requests;

use Config;
use Dingo\Api\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'txtname'=>'required',
            'txtdob'=>'required',
            'txtaddress'=>'required',
        ];
    }

    public function messages(){
        return [
            'txtname.required'=>'Vui lòng nhập!!!',
            'txtdob.required'=>'Vui lòng nhập!!!',
            'txtaddress.required'=>'Vui lòng nhập!!!',
        ];
    }
}
