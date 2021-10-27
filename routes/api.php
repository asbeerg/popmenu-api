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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('menus', [
    'uses' => 'App\Http\Controllers\MenuController@index'
]);

Route::get('menus/{id}', [
    'uses' => 'App\Http\Controllers\MenuController@show'
]);

Route::post('menus', [
    'uses' => 'App\Http\Controllers\MenuController@store'
]);

Route::get('menus/{menu_id}/menu-item', [
    'uses' => 'App\Http\Controllers\MenuItemController@index'
]);

Route::post('menus/{menu_id}/menu-item', [
    'uses' => 'App\Http\Controllers\MenuItemController@store'
]);

Route::post('menus/{menu_id}/menu-item/{id}', [
    'uses' => 'App\Http\Controllers\MenuItemController@edit'
]);

Route::get('storage/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = public_path($filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
