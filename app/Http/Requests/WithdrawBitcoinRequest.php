<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WithdrawBitcoinRequest extends Request
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
            'btc_address_select' => 'required',
            'btc_withdraw_amount' => array('required', 'numeric', 'max:99999999', 'regex:/^([0-9]{1,8})*(\.?[0-9]{1,9})$/'),
        ];
    }
}
