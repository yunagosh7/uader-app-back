<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

Route::group([
    'prefix' => 'auth'
], function ($router) {


    Route::get("/", [AuthController::class, 'getByEmail']);

    Route::post("/sign-up", [AuthController::class, 'signUp']);

    Route::post("/log-in", [AuthController::class, 'logIn']);
});
