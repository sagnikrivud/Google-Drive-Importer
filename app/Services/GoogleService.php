<?php

namespace App\Services;

use Google\Client;

class GoogleService {
  protected $googleClient;

  /**
   * Initiate Google Client
   */
  public function __construct() {
    $this->googleClient =  new Client();
  }
}