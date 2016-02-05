<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class sociolla extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sociolla:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installing sociolla management pages';

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
        $this->line('Tunggu');
        \Artisan::call('db:seed');
        
        $this->output->progressStart(10);

        for ($i = 0; $i < 5; $i++) {
            sleep(1);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();   
        $this->line('Sukses :)');
    }
}
