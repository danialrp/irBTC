<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddIrrBankRequest extends Request
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
            'bank_name' => 'required',
            'card_number' => array('required', 'size:19', 'regex:/^[0-9-]*$/'),
            'acc_number' => array('required', 'max:25', 'min:3', 'regex:/^[a-zA-Z0-9.-]*$/'),
            'shaba_number' => 'size:22'
        ];
    }
}
