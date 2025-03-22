<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessWebhookJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    //public function handle(array $payload)
    public function handle(array $payload)
    {
        // Process the webhook payload asynchronously
        // Perform actions based on the webhook data
        ds('Processing webhook payload:', $payload);
    }
}
