<?php

use App\Trade;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trades')->delete();
    }
}
