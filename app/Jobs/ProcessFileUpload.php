<?php

namespace App\Jobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Google\Client;
use GuzzleHttp\Client as GuzzleClient;
use App\Models\FileUploadLog;
use Google_Service_Drive;

class ProcessFileUpload extends Job implements ShouldQueue{
  protected $file;

  protected $googleClient;

  protected $httpClient;
  /**
   * Initiate Google Client
   */
  public function __construct()
  {
    $this->googleClient =  new Client();
    $this->httpClient = new GuzzleClient();
  }
  /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $apiKey = env('GOOGLE_API_KEY');
      $this->googleClient->setDeveloperKey($apiKey);
      $this->googleClient->addScope(\Google_Service_Drive::DRIVE_FILE);
      $response = $this->httpClient->get($request->share);
      $contentDispositionHeader = $response->getHeaderLine('Content-Disposition');
      $fileName =  $this->extractFilenameFromContentDisposition($contentDispositionHeader);
      $fileContent = $response->getBody()->getContents();
    }

  public function publicPath($path = '')
  {
      return rtrim(app()->basePath('public/' . $path), '/');
  }

  function extractFilenameFromContentDisposition($header)
  {
    $matches = [];
    preg_match('/filename="([^"]+)"(?:; filename\*=UTF-8\'\'([^"]+))?/', $header, $matches);
    if (isset($matches[2])) {
        return urldecode($matches[2]);
    }
    return $matches[1];
  }
}
