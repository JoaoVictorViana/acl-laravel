<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});

Route::middleware(['apiJWT', 'role:User'])->get('/role/user', function() {
    return 'Você é um user';
});

Route::middleware(['apiJWT', 'role:Admin'])->get('/role/admin', function() {
    return 'Você é um Admin';
});

Route::middleware(['apiJWT', 'role_or_permission:Admin|User|user_read'])->get('/permission/user', function() {
    return 'Você está vendo uma tela que todo usuário vai ver';
});

Route::middleware(['apiJWT', 'role_or_permission:Admin|grafic_bar'])->get('/permission/grafic', function() {
    return 'Você está vendo os gráficos, somente quem tem permissão de ver este gráfico';
});