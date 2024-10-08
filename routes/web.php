<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TodoController;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Input;


Route::group([
    'middleware' => 'api',
    'prefix' => 'api',
], function ($router) {

    // get all tesis
    Route::get("/tesis", function(Request $request){
        $obj = array([
            "name" => "tesis 1",
            "id" => 1
        ],
        [
            "name" => "tesis 2",
            "id" => 2
        ]
    );
        return $obj;
    });

    Route::post("/tesis1234", function(Request $request) {
        
        $body = Request::all();
        // create a record in the db
        
        return $body;
    });


    Route::post("/tesis", function(Request $request) {
        
        $body = Request::all();
        // create a record in the db
        
        return $body;
    });


    Route::delete("/tesis/{tesisId}", function(Request $request){
        $body = $request->all();
        // $obj = array([
        //     "name" => "tesis 1",
        //     "id" => 1
        // ],
        // [
        //     "name" => "tesis 2",
        //     "id" => 2
        // ]
    // );
        $itemId = Input::get('tesisId');
        // get element by id
        return $itemId;
    });
    Route::put("/tesis", function(Request $request) {
        
        $body = Request::all();
        
        // update a record in the db
        
        return $body;
    });

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

    Route::post('/todos', [TodoController::class, "create"]);

    require __DIR__.'/auth.php';
});

// require __DIR__.'/files.php';
// require __DIR__.'/tasks.php';
