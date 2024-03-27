<?php

namespace App\Services;

use Google\Client;
use App\Jobs\ProcessFileUpload;

class GoogleService {
  protected $googleClient;

  /**
   * Initiate Google Client
   */
  public function __construct() {
    $this->googleClient =  new Client();
  }

  /**
   * Handle Upload process
   *
   * @param [type] $request
   * @return void
   */
  public function uploadProcess($request)
  {
    $apiKey = env('GOOGLE_API_KEY');
    $url = 'https://www.googleapis.com/drive/v3/files?key=' . $apiKey;
    // $this->googleClient->setAuthConfig($this->publicPath('Google/client.json'));
    $this->googleClient->setDeveloperKey($apiKey);
    // $this->googleClient->setAccessType('offline');
    $this->googleClient->addScope(\Google_Service_Drive::DRIVE_FILE);
    // if ($request->has('code')) {
    //   return $this->googleClient->fetchAccessTokenWithAuthCode($request->input('code'));
    //   return $accessToken = $this->googleClient->getAccessToken();
    //   } else {
    //   // Redirect to Google for authorization
    //   $authUrl = $this->googleClient->createAuthUrl();
    //   return redirect()->to($authUrl);
    // }
    $driveService = new \Google_Service_Drive($this->googleClient);
    $files = $driveService->files->listFiles();
    return response()->json($files);
    dispatch(new ProcessFileUpload());
  }

  public function publicPath($path = '')
  {
      return rtrim(app()->basePath('public/' . $path), '/');
  }
}