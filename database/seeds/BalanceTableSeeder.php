<?php

use App\Balance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('balances')->delete();
        DB::table('balances')->insert([
            ['id' => 1, 'owner' => 1, 'money' => 1, 'current_balance' => 0, 'last_balance' => 0,],
            ['id' => 2, 'owner' => 1, 'money' => 2, 'current_balance' => 0, 'last_balance' => 0],
            ['id' => 3, 'owner' => 1, 'money' => 3, 'current_balance' => 0, 'last_balance' => 0],
            ['id' => 4, 'owner' => 1, 'money' => 4, 'current_balance' => 0, 'last_balance' => 0],
            ['id' => 5, 'owner' => 1, 'money' => 5, 'current_balance' => 0, 'last_balance' => 0],
            ['id' => 6, 'owner' => 2, 'money' => 1, 'current_balance' => 1000000, 'last_balance' => 0,],
            ['id' => 7, 'owner' => 2, 'money' => 2, 'current_balance' => 0, 'last_balance' => 0],
            ['id' => 8, 'owner' => 2, 'money' => 3, 'current_balance' => 10, 'last_balance' => 0],
            ['id' => 9, 'owner' => 2, 'money' => 4, 'current_balance' => 200, 'last_balance' => 0],
            ['id' => 10, 'owner' => 2, 'money' => 5, 'current_balance' => 100, 'last_balance' => 0]
        ]);
    }
}
