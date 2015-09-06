<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminNewUserRequest extends Request
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
            'fname' => 'max:60',
            'lname' => 'max:60',
            'nname' => array('required','max:60','unique:users','regex:/^[a-zA-Z0-9_@.-]*$/'),
            'email' =>'required|email|unique:users',
            'password' => 'required',
            'tel' => array('regex:/^[0-9]*$/'),
            'mobile' => array('regex:/^[0-9]*$/'),
            'national_number' => array('unique:users','size:10','regex:/^[0-9]*$/'),
            'address' => 'max:150',
        ];
    }
}
