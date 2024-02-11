<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\setRoutesController;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('setRoutes', function () {
    $controller = new setRoutesController();
    $controller->set();
})->purpose('insert routes into database ');

Artisan::command('updateRoutes', function () {
    $controller = new setRoutesController();
    $controller->updateRoutes();
})->purpose('updating the routes ');
