<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;

$arr = array();

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
