<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessWebhookJob;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // verify the payload authenticity
        // Send payload to job for processing
        ds('handle', $request->all());
        $payload = ['teste teste','teste 2'];
        ProcessWebhookJob::dispatch($payload);

        return response()->json(['success' => true]);
    }
}
