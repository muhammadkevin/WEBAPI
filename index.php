<?php

/**
 * @package  Untold Stories
 * @author   Muhammad Kevin
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
*/

require __DIR__.'/untoldstories/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
*/

$app = require_once __DIR__.'/untoldstories/bootstrap/app.php';

$app->bind('path.public', function() {
return __DIR__;
});

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
