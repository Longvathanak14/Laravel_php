<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'=>'required|max:100',
            'last_name'=>'required|max:100',
            'department_id'=>'required|integer',
        ];
    }
}
