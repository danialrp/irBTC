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
            ['id' => 1, 'name' => 'Toman', 'fa_name' => 'تومان', 'symbol' => 'T'],
            ['id' => 2, 'name' => 'Dollar', 'fa_name' => 'دلار', 'symbol' => 'USD'],
            ['id' => 3, 'name' => 'Bitcoin', 'fa_name' => 'بیتکوین', 'symbol' => 'BTC'],
            ['id' => 4, 'name' => 'Webmoney', 'fa_name' => 'وبمانی', 'symbol' => 'WMZ'],
            ['id' => 5, 'name' => 'PerfectMoney', 'fa_name' => 'پرفکت مانی', 'symbol' => 'PM',]
        ]);
    }
}
