<?php

use App\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->delete();
        DB::table('types')->insert([
            ['id' => 1, 'name' => 'sell', 'fa_name' => 'فروش'],
            ['id' => 2, 'name' => 'buy', 'fa_name' => 'خرید'],
            ['id' => 3, 'name' => 'exchange', 'fa_name' => 'معاوضه'],
            ['id' => 4, 'name' => 'deposit', 'fa_name' => 'افزایش'],
            ['id' => 5, 'name' => 'withdraw', 'fa_name' => 'برداشت']
        ]);
    }
}
