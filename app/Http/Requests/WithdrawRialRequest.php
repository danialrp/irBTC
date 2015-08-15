<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WithdrawRialRequest extends Request
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
            'irr_withdraw_amount' => array('required', 'regex:/^([0-9]{1,8})$/')
        ];
    }
}
