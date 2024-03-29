<?php

use Illuminate\Contracts\Queue\ShouldQueue;

return [
  /*
    |--------------------------------------------------------------------------
    | Default Queue Connection Name
    |--------------------------------------------------------------------------
    |
    | Lumen supports Redis, Beanstalkd, Amazon SQS, and synchronous drivers
    | out of the box. You can also specify the name of a connection to use
    | as your default queue driver here. This connection will be used for
    | every queue operation unless a different connection is specified.
    |
    */
    'default' => env('QUEUE_CONNECTION', 'sync'),
    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection information for each server that
    | is used by your application. A default configuration has been added
    | for each back-end shipped with Lumen. You are free to add more.
    |
    */
    'connections' => [

      'sync' => [
          'driver' => 'sync',
      ],

      'redis' => [
          'driver' => 'redis',
          'connection' => 'default',
          'queue' => env('REDIS_QUEUE', 'default'),
          'retry_after' => 90,
      ],

      'beanstalkd' => [
          'driver' => 'beanstalkd',
          'host' => 'localhost',
          'queue' => 'default',
          'retry_after' => 90,
          'block_for' => 0,
      ],

      'sqs' => [
          'driver' => 'sqs',
          'key' => env('AWS_ACCESS_KEY_ID'),
          'secret' => env('AWS_SECRET_ACCESS_KEY'),
          'prefix' => env('SQS_PREFIX', 'https://sqs.us-east-1.amazonaws.com/your-account-id'),
          'queue' => env('SQS_QUEUE', 'your-queue-name'),
          'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
      ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control which database and table are used to store the jobs that
    | have failed. You may change them to any database / table you wish.
    |
    */
    'failed' => [
      'database' => env('DB_CONNECTION', 'mysql'),
      'table' => 'failed_jobs',
    ],
];