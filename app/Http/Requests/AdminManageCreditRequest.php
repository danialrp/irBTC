<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminManageCreditRequest extends Request
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
            'irr_deposit_amount' => array('regex:/^(-?[0-9]{1,8})$/'),
            'btc_deposit_amount' => array('regex:/^(-?[0-9]{1,8})*(\.?[0-9]{1,9})$/'),
            'wm_deposit_amount' => array('regex:/^(-?[0-9]{1,8})*(\.?[0-9]{1,2})$/'),
            'pm_deposit_amount' => array('regex:/^(-?[0-9]{1,8})*(\.?[0-9]{1,2})$/'),
        ];
    }
}
