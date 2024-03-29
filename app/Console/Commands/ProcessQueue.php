<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Queue\Worker;
use Illuminate\Queue\WorkerOptions;

class ProcessQueue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:process';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process jobs from the queue';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(Worker $worker)
    {
        $options = new WorkerOptions();
        $options->sleep = 3;
        
        $this->info('Processing queue...');
        $worker->daemon('default', null, $options);
    }
}
