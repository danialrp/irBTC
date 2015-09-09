<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepositRialRequest extends Request
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
            'our_banks' => 'required',
            'irr_deposit_amount' => array('required', 'regex:/^([0-9]{1,8})$/'),
            'tracking_number' => array('max:50', 'regex:/^[a-zA-Z0-9.-]*$/')
        ];
    }
}
