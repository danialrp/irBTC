<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*DB::table('users')->delete();*/
        DB::table('users')->insert([
            ['id' => 1, 'email' => 'admin@me.com', 'password' => Hash::make('0000'), 'role' => 1],
            ['id' => 2, 'email' => 'danial@me.com', 'password' => Hash::make('0000'), 'role' => 2]
        ]);
    }
}
