<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeService extends Command {
  /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service class}';

     /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Service files';

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
      $name = $this->argument('name');
      $className = Str::studly($name);
      $path = base_path('app/Services/' . $className . '.php');
      if (file_exists($path)) {
        $this->error('Service already exists!');
        return false;
      }
      $stub = file_get_contents(__DIR__ . '/stubs/service.stub');
      $stub = str_replace('{{className}}', $className, $stub);
      file_put_contents($path, $stub);
      $this->info('Service created successfully: ' . $className);
    }
}