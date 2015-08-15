<?php

use Illuminate\Database\Seeder;

class ActiveTradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('active_trades')->delete();
    }
}
