<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\Facades\DB;

class EmptyJobsTable implements ShouldQueue
{
    public function handle(JobProcessed $event)
    {
        DB::table('jobs')->where('id', $event->job->getJobId())->delete();
    }

    public function failed(JobFailed $event)
    {
        // Delete the job record from the database if it fails
        DB::table('jobs')->where('id', $event->job->getJobId())->delete();
    }
}