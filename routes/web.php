<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;

$arr = array();

Route::group([
    'middleware' => 'api',
    'prefix' => 'api'
], function ($router) {

    Route::get('/token', function () {
        return csrf_token();
    });

    Route::get('/', function () {
        return 'welcome';
    });


    Route::get('/todos', [TodoController::class, 'getAll']);

    Route::post('/create', function (Request $request) {
        return "test";
        // array_push($arr, $request->);
    });

    require __DIR__.'/auth.php';
});

// require __DIR__.'/files.php';
// require __DIR__.'/tasks.php';
