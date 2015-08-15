<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateInfoRequest extends Request
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
            'fname' => 'required|max:60',
            'lname' => 'required|max:60',
            'nname' => array('required','max:60','unique:users','regex:/^[a-zA-Z0-9_@.-]*$/'),
            'tel' => array('required','max:13','min:6','regex:/^[0-9]*$/'),
            'mobile' => array('required','size:11','regex:/^[0-9]*$/'),
            'national_number' => array('required','unique:users','size:10','regex:/^[0-9]*$/'),
            'address' => 'required|max:150',
        ];
    }
}
