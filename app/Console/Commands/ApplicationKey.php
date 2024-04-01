<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class ApplicationKey extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'application:secret';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate application key';

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
      $randomBytes = exec('php -r "echo bin2hex(random_bytes(16));"');
      $envFilePath = base_path('.env');
      $envContents = file_get_contents($envFilePath);
      $newEnvContents = preg_replace(
        '/^APP_KEY=(.*)$/m',
        'APP_KEY=' . $randomBytes,
        $envContents
      );
      file_put_contents($envFilePath, $newEnvContents);
      $this->info("Key Generated");
    }
}