<?php

namespace App\Services;

use Google\Client;
use App\Jobs\ProcessFileUpload;
use GuzzleHttp\Client as GuzzleClient;
use App\Models\FileUploadLog;
use Google_Service_Drive;
class GoogleService {
  protected $googleClient;

  protected $httpClient;
  /**
   * Initiate Google Client
   */
  public function __construct() {
    $this->googleClient =  new Client();
    $this->httpClient = new GuzzleClient();
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
    $response = $this->httpClient->get($request->share);
    $contentDispositionHeader = $response->getHeaderLine('Content-Disposition');
    $fileName =  $this->extractFilenameFromContentDisposition($contentDispositionHeader);
    $fileContent = $response->getBody()->getContents();
    $fileMetadata = new \Google_Service_Drive_DriveFile([
      'name' => $fileName
    ]);
    $googleDriveService = new Google_Service_Drive($this->googleClient);
    $uploadedFile = $googleDriveService->files->create($fileMetadata, [
      'data' => $fileContent,
      'mimeType' => 'application/octet-stream',
      'uploadType' => 'multipart'
    ]);
    $data = [
      'request_url' => $request->share,
      'file_type'   => 'URL',
      'drive_response' => $uploadedFile
    ];
    FileUploadLog::create($data);
    return response()->json($uploadedFile);
    // if ($request->has('code')) {
    //   return $this->googleClient->fetchAccessTokenWithAuthCode($request->input('code'));
    //   return $accessToken = $this->googleClient->getAccessToken();
    //   } else {
    //   // Redirect to Google for authorization
    //   $authUrl = $this->googleClient->createAuthUrl();
    //   return redirect()->to($authUrl);
    // }
    // $driveService = new \Google_Service_Drive($this->googleClient);
    // $files = $driveService->files->listFiles();
    // return response()->json($files);
    dispatch(new ProcessFileUpload());
  }

  public function publicPath($path = '')
  {
      return rtrim(app()->basePath('public/' . $path), '/');
  }

  function extractFilenameFromContentDisposition($header)
  {
    $matches = [];
    // Regular expression to match both regular and extended filename parameters
    preg_match('/filename="([^"]+)"(?:; filename\*=UTF-8\'\'([^"]+))?/', $header, $matches);
    // Check if the extended filename parameter is present and decode it if so
    if (isset($matches[2])) {
        return urldecode($matches[2]);
    }
    // If the extended filename parameter is not present, use the regular filename parameter
    return $matches[1];
  }
}