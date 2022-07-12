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


Route::group(['middleware'=>'apiKey'],function(){

    Route::Post('/statistic', [App\Http\Controllers\api\statisticsController::class, 'store']);

    Route::get('/statisticInfo', [App\Http\Controllers\api\statisticsController::class, 'index']);

    Route::get('/alarm', [App\Http\Controllers\api\AlarmController::class, 'index']);


});
