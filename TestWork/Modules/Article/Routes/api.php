<?php

use Illuminate\Http\Request;
use Modules\Article\Http\Controllers\ArticleApiController;

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

/*Route::middleware('auth:api')->get('/article', function (Request $request) {
    return $request->user();
});*/
Route::apiResource('/article',ArticleApiController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
])->middleware(\Modules\Article\Http\Middleware\HeaderJsonResponse::class);
