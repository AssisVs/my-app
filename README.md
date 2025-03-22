laravel new my-app

cd my-app
npm install 
 npm run build
composer run dev

pa migrate

composer require livewire/livewire

php artisan make:livewire counter
This command will generate two new files in your project:

app/Livewire/Counter.php
resources/views/livewire/counter.blade.php

Open app/Livewire/Counter.php and replace its contents with the following:

<?php
 
namespace App\Livewire;
 
use Livewire\Component;
 
class Counter extends Component
{
    public $count = 1;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }
 
    public function render()
    {
        return view('livewire.counter');
    }
}

Open the resources/views/livewire/counter.blade.php file and replace its content with the following:

<div>
    <h1>{{ $count }}</h1>
 
    <button wire:click="increment">+</button>
 
    <button wire:click="decrement">-</button>
</div>

Open the routes/web.php file in your Laravel application and add the following code:

use App\Livewire\Counter;
 
Route::get('/counter', Counter::class);

resources/views/components/layouts/app.blade.php

You may create this file if it doesn't already exist by running the following command:

php artisan livewire:layout
This command will generate a file called resources/views/components/layouts/app.blade.php with the following contents:

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>

Visit /counter in your browser

/**************/

METODO 1

// routes/web.php

use App\Http\Controllers\WebhookController;

Route::post('webhook/endpoint', [WebhookController::class, 'handle']);

*** The URIs that should be excluded from CSRF verification.*
* @var array<int, string>
*/
app/bootstrap/app.php
protected $except = ['webhook/endpoint'];

php artisan make:controller WebhookController

Method 2: Queue-Based Processing
php artisan make:job ProcessWebhookJob

// app/Http/Controllers/WebhookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        // verify the payload authenticity

        // Send payload to job for processing
        ProcessWebhookJob::dispatch($request->all());

        return response()->json(['success' => true]);
    }
}

Method 3: Laravel Webhook Packages
composer require spatie/laravel-webhook-client
php artisan vendor:publish --provider="Spatie\WebhookClient\WebhookClientServiceProvider" --tag="webhook-client-config"

*ver contig/webhook-client.php* - tem que criar uma class esendida se não dá erro.

php artisan vendor:publish --provider="Spatie\WebhookClient\WebhookClientServiceProvider" --tag="webhook-client-migrations"
php artisan migrate

atualizar webhook-client.php
criar :
PaystackSignature.php
ProcessWebhook.php

criar nova rota : Route::webhooks('paystack/webhook');

Do not forget to add the endpoint to the except array of the VerifyCsrfToken middleware.
PS: Don’t forget to run php artisan queue:listen to process the jobs.
