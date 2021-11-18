<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\SincesController;
use App\Http\Controllers\DepartamentsController;
use Illuminate\Support\Facades\Http;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hola',function(Request $request)
{
    return " Hola compas como se encuentran homies";
});



// estas rutas se pueden acceder sin proveer de un token válido.
Route::post('/login', 'AuthController@login');
Route::post('/register', 'AuthController@register');
// estas rutas requiren de un token válido para poder accederse.
Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('/logout', 'AuthController@logout');
});


Route::get('/e', [EmployeesController::class, 'all']);
Route::get('/e/get/{i}', [EmployeesController::class, 'read']);
Route::get('/e/get/join', [EmployeesController::class, 'read_esp']);
Route::post('/e/create', [EmployeesController::class, 'create']);
Route::put('/e/update/{i}', [EmployeesController::class, 'update']);
Route::delete('/e/delete/{i}', [EmployeesController::class, 'delete']);

Route::get('/s', [DepartamentsController::class, 'all']);
Route::get('/s/get/{i}', [SincesController::class, 'read']);
Route::get('/s/get/join', [SincesController::class, 'read_esp']);
Route::post('/s/create', [SincesController::class, 'create']);
Route::put('/s/update/{i}', [SincesController::class, 'update']);
Route::delete('/s/delete/{i}', [SincesController::class, 'delete']);

Route::get('/d', [DepartamentsController::class, 'all']);
Route::get('/d/get/{i}', [DepartamentsController::class, 'read']);
Route::get('/d/get/join', [DepartamentsController::class, 'read_esp']);
Route::post('/d/create', [DepartamentsController::class, 'create']);
Route::put('/d/update/{i}', [DepartamentsController::class, 'update']);
Route::delete('/d/delete/{i}', [DepartamentsController::class, 'delete']);

Route::get('/guzzle' , function(){
    $response = Http::get('https://jsonplaceholder.typicode.com/posts');
    $posts= json_decode($response->body());
    foreach($posts as $post)
    {
        echo $post->title;
        die();
    }
});