<?php

namespace App\Console\Commands;

use App\MyClasses\BlockchainClass;
use Illuminate\Console\Command;

class UpdateRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'irbtc:updateRate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';
    /**
     * @var BlockchainClass
     */
    private $blockchainClass;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(BlockchainClass $blockchainClass)
    {
        parent::__construct();
        $this->blockchainClass = $blockchainClass;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->blockchainClass->getLatestRate();
    }
}
