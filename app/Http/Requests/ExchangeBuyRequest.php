<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExchangeBuyRequest extends Request
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
            'buy_exchange_amount' => array('required','regex:/^([0-9]{1,8})*(\.?[0-9]{1,6})$/'),
        ];
    }
}
