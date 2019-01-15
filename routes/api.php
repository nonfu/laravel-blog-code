<?php

use Illuminate\Http\Request;

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
Route::middleware('throttle:60,1')->prefix('v1')->group(function() {
    // 文章首页
    Route::get('/articles', 'API\PostController@index');
    // 文章详情页
    Route::get('/article/{id}', 'API\PostController@detail')->where(['id' => '[1-9]{1}[0-9]*']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
