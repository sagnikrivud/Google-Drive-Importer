<?php

namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Google\Client;

class ProcessFileUpload extends Job implements ShouldQueue{
  protected $file;

  protected $googleClient;

  /**
   * Initiate Google Client
   */
  public function __construct()
  {
    $this->googleClient =  new Client();
  }
  /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $apiKey = env('GOOGLE_API_KEY');
      $url = 'https://www.googleapis.com/drive/v3/files?key=' . $apiKey;
      $this->googleClient->setApplicationName("Client_Library_Examples");
      $this->googleClient->setDeveloperKey($apiKey);
      $this->googleClient->addScope(Google\Service\Drive::DRIVE);
      $driveService = new \Google_Service_Drive($this->googleClient);
      $files = $driveService->files->listFiles();
      return response()->json($files);
    }
}
