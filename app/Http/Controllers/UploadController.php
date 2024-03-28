<?php

namespace App\Http\Controllers;

use App\Services\GoogleService;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UploadController extends Controller {
  public $service;

  /**
   * Public Service
   *
   * @param GoogleService $service
   */
  public function __construct(GoogleService $service)
  {
    $this->service = $service;
  }

  public function uploadProcess(Request $request)
  {
    try{
      return $data = $this->service->uploadProcess($request);
      if($data){
        return response()->json(['message' => 'File upload in process', 'status' => 200], 200);
      }else{
        return response()->json(['message' => 'Error on process', 'status' => 500], 500);
      }
    }catch(RequestException $e){
      return response()->json(['error' => $e->getMessage(), 'status' => 500 ], 500);
    }
  }

  public function outhCallBack(Request $request)
  {
    try{
      return $request;
    }catch(RequestException $e){
      return response()->json(['error' => $e->getMessage(), 'status' => 500 ], 500);
    }
  }
}
