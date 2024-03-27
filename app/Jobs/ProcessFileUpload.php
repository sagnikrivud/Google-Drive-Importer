<?php

namespace App\Jobs;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessFileUpload extends Job implements ShouldQueue{
  protected $file;

  /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Logic to process file upload
    }
}
