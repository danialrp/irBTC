<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlockchainRateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blockchain_rates')->delete();
        DB::table('blockchain_rates')->insert([
            ['id' => 1, 'previous' => 0, 'last' => 0, 'buy' => 0, 'sell' => 0]
        ]);
    }
}
