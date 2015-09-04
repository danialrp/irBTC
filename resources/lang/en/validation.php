<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => 'The :attribute must be a valid email address.',
    'filled'               => 'The :attribute field is required.',
    'exists'               => 'The selected :attribute is invalid.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'email' => [
            'required' => 'لطفا ایمیل خود را وارد کنید!',
            'email' => 'فرمت ایمیل وارد شده صحیح نمی باشد!',
            'max' => 'طول فیلد ایمیل از حد مجاز بیشتر است!',
            'unique' => 'این ایمیل توسط کاربر دیگری ثبت شده است!',
        ],

        'password' => [
            'required' => 'لطفا کلمه عبور خود را وارد کنید!',
            'confirmed' => 'کلمه های عبور یکسان نیستند!',
            'min' => 'کلمه عبور حداقل باید ۸ حرف باشد!',
            'regex' => 'کلمه عبور باید شامل حروف کوچک و بزرگ و اعداد باشد!',
        ],

        'fname' => [
            'required' => 'فیلد نام ضروری است!',
            'max' => 'طول فیلد نام از حد مجاز بیشتر است!',
        ],
        'lname' => [
            'required' => 'فیلد نام خانوادگی ضروری است!',
            'max' => 'طول فیلد نام خانوادگی از حد مجاز بیشتر است!',
        ],
        'nname' => [
            'required' => 'فیلد نام کاربری ضروری است!',
            'max' => 'طول فیلد نام کاربری از حد مجاز بیشتر است!',
            'regex' => 'نام کاربری شامل حروف انگلیسی،اعداد و کارکترهای مجاز می باشد!',
            'unique' => 'این نام کاربری توسط کاربر دیگری ثبت شده است!',
        ],
        'tel' => [
            'required' => 'فیلد تلفن ضروری است!',
            'max' => 'شماره تلفن حداکثر باید ۱۳ رقم باشد!',
            'min' => 'شماره تلفن حداقل باید ۶ رقم باشد!',
            'regex' => 'فیلد تلفن باید مقدار عددی باشد!',
        ],
        'mobile' => [
            'required' => 'فیلد موبایل ضروری است!',
            'size' => 'شماره موبایل باید ۱۱ رقم باشد!',
            'regex' => 'فیلد موبایل باید مقدار عددی باشد!',
        ],
        'national_number' => [
            'required' => 'فیلد شماره ملی ضروری است!',
            'size' => 'شماره ملی باید ۱۰ رقم باشد!',
            'unique' => 'این شماره ملی در سیستم ثبت شده است!',
            'regex' => 'فیلد شماره ملی باید مقدار عددی باشد!',
        ],
        'address' => [
            'required' => 'فیلد آدرس ضروری است!',
            'max' => 'طول فیلد آدرس از حد مجاز بیشتر است!',
        ],
        'sell_amount' => [
            'required' => 'لطفا مقدار را وارد کنید!',
            'regex' => 'مقدار را به صورت صحیح وارد کنید!',
        ],
        'sell_value' => [
            'required' => 'لطفا نرخ واحد را وارد کنید!',
            'regex' => 'نرخ واحد را به صورت صحیح وارد کنید!',
        ],
        'bank_name' => [
            'required' => 'لطفا نام بانک خود را انتخاب کنید!'
        ],
        'card_number' => [
            'required' => 'لطفا شماره کارت خود را وارد کنید!',
            'size' => 'لطفا بر اساس فرمت نمونه شماره کارت خود را وارد کنید!',
            'regex' => 'شماره کارت را به صورت صحیح وارد کنید!'
        ],
        'acc_number' => [
            'required' => 'لطفا شماره حساب خود را وارد کنید!',
            'max' => 'طول فیلد شماره حساب از مقدار مجاز بیشتر است!',
            'min' => 'طول فیلد شماره حساب از مقدار مجاز کمتر است!',
            'regex' => 'شماره حساب را به صورت صحیح وارد کنید!'
        ],
        'shaba_number' => [
            'size' => 'شماره شبا باید ۲۲ رقم باشد!'
        ],
        'btc_address' => [
            'required' => 'لطفا آدرس کیف پول بیتکوین خود را وارد کنید!',
            'regex' => 'فرمت آدرس کیف پول وارد شده صحیح نمی باشد!'
        ],
        'irr_deposit_amount' => [
            'required' => 'لطفا مبلغ را وارد کنید!',
            'regex' => 'لطفا مقدار مبلغ را به صورت صحیح وارد کنید!'
        ],
        'tracking_number' => [
            'required' => 'لطفا شماره پیگیری را وارد کنید!',
            'max' => 'طول فیلد شماره پیگیری از مقدار مجاز بیشتر است!',
            'regex' => 'لطفا شماره پیگیری را به صورت صحیح وارد کنید!'
        ],
        'our_banks' => [
            'required' => 'لطفا بانک مقصد را انتخاب کنید!'
        ],
        'irr_withdraw_amount' => [
            'required' => 'لطفا مبلغ را وارد کنید!',
            'regex' => 'لطفا مقدار مبلغ را به صورت صحیح وارد کنید!'
        ],
        'btc_deposit_amount' => [
            'required' => 'لطفا مقدار بیتکوین را وارد کنید!',
            'regex' => 'لطفا مقدار بیتکوین را به صورت صحیح وارد کنید!'
        ],
        'btc_withdraw_amount' => [
            'required' => 'لطفا مقدار بیتکوین را وارد کنید!',
            'regex' => 'لطفا مقدار بیتکوین را به صورت صحیح وارد کنید!'
        ],
        'btc_address_select' => [
            'required' => 'لطفا آدرس کیف پول بیتکوین خود را انتخاب کنید!',
        ],
        'our_btc_address' => [
            'required' => 'لطفا آدرس کیف پول مقصد را انتخاب کنید!',
        ],
        'currency_report' => [
            'required' => 'لطفا واحد پول مورد نظر خود را انتخاب کنید!',
        ],
        'kind_report' => [
            'required' => 'لطفا نوع تراکنش را انتخاب کنید!',
        ],
        'status_report' => [
            'required' => 'لطفا وضعیت تراکنش را انتخاب کنید!',
        ],
        'wm_deposit_amount' => [
            'required' => 'لطفا مقدار دلار وب مانی را وارد کنید!',
            'regex' => 'لطفا مقدار دلار وب مانی را به صورت صحیح وارد کنید!'
        ],
        'pm_deposit_amount' => [
            'required' => 'لطفا مقدار دلار پرفکت مانی را وارد کنید!',
            'regex' => 'لطفا مقدار دلار پرفکت مانی را به صورت صحیح وارد کنید!'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
