<?php

use App\Fee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->delete();
        DB::table('fees')->insert([
            ['id' => 1, 'name' => 'trade-fee', 'fa_name' => 'کارمزد مبادله', 'fee_value' => '0.004'],
            ['id' => 2, 'name' => 'withdraw-irr-fee', 'fa_name' => 'کارمزد برداشت ریالی', 'fee_value' => '900'],
            ['id' => 3, 'name' => 'withdraw-btc-fee', 'fa_name' => 'کارمزد برداشت بیتکوین', 'fee_value' => '0.001'],
        ]);
    }
}
