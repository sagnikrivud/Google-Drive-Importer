<?php

namespace App\Repositories\FileRepository;

use App\Models\FileUploadLog;

class FileUploadLogRepository {

  protected $model;

  public function __construct()
  {
    $this->model = new FileUploadLog();
  }
}