<?php

use App\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->delete();
        DB::table('statuses')->insert([
            ['id' => 1, 'name' => 'open', 'fa_name' => 'باز'],
            ['id' => 2, 'name' => 'complete', 'fa_name' => 'تکمیل'],
            ['id' => 3, 'name' => 'cancel', 'fa_name' => 'لغو'],
            ['id' => 4, 'name' => 'processing', 'fa_name' => 'در حال انجام']
        ]);
    }
}
