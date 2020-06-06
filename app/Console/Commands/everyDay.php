<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Meal;
class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meals:putZero';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will put All Meal day counter to zero';

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
        Meal::query()->update(['day_prg' => 0]);
        echo "your computer has been hacked successfully";
    }
}
