<?php

use App\Money;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoneyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monies')->delete();
        DB::table('monies')->insert([
            ['id' => 1, 'name' => 'Toman', 'fa_name' => 'تومان', 'symbol' => 'T', 'sell_rate' => '3440', 'buy_rate' => '3420', 'rate' => '3430'],
            ['id' => 2, 'name' => 'Dollar', 'fa_name' => 'دلار', 'symbol' => 'USD', 'sell_rate' => '1', 'buy_rate' => '1', 'rate' => '1'],
            ['id' => 3, 'name' => 'Bitcoin', 'fa_name' => 'بیتکوین', 'symbol' => 'BTC', 'sell_rate' => '210', 'buy_rate' => '190', 'rate' => '200'],
            ['id' => 4, 'name' => 'Webmoney', 'fa_name' => 'وبمانی', 'symbol' => 'WMZ', 'sell_rate' => '1.1', 'buy_rate' => '0.9', 'rate' => '1.1'],
            ['id' => 5, 'name' => 'PerfectMoney', 'fa_name' => 'پرفکت مانی', 'symbol' => 'PM', 'sell_rate' => '1.1', 'buy_rate' => '0.9', 'rate' => '1.1']
        ]);
    }
}
