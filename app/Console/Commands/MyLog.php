<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyLog extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'h:nh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '写一句你好';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("====你好世界====");
    }
}
