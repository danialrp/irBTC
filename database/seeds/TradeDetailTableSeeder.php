<?php

use App\TradeDetail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TradeDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trade_details')->delete();
    }
}
