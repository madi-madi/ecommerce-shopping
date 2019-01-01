<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;
class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ecommerce:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ecommerce Refresh #bestme Forsan Technology';

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
       Artisan::call('view:clear');
    }
}
