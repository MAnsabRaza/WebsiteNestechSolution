<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 */

// Ensure the server is using PHP 8
if (version_compare(PHP_VERSION, '8.0.0', '<')) {
    die('PHP >= 8.0.0 is required');
}

// Vercel environment fix
if (isset($_ENV['VERCEL_REGION'])) {
    $_SERVER['SCRIPT_NAME'] = '/api/index.php';
}

// Define the application root directory
define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
*/
require __DIR__ . '/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
*/
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Vercel tmp directory setup for cache
if (isset($_ENV['VERCEL_REGION'])) {
    $app->useStoragePath('/tmp');
}

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
*/
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);