<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUser extends FormRequest
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
            'name'=>'required|string',
            'email'=>'email|unique:users|required',
            'password'=>'required|string|min:6|confirmed',
            'created_at'=>'date|nullable',
            'updated_at'=>'date|nullable'
        ];
    }
}
