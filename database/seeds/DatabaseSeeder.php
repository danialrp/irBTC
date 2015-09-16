<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('RoleTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('TypeTableSeeder');
        $this->call('StatusTableSeeder');
        $this->call('MoneyTableSeeder');
        $this->call('FeeTableSeeder');
        $this->call('BalanceTableSeeder');
        $this->call('TradeTableSeeder');
        $this->call('TradeDetailTableSeeder');
        $this->call('ActiveTradeTableSeeder');
        $this->call('BankTableSeeder');
        $this->call('TransactionTableSeeder');
        $this->call('BlockchainRateTableSeeder');

        Model::reguard();
    }
}
