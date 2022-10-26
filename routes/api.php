<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\PlateformLogsController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

    Route::get('/plateformlogs', [PlateformLogsController::class, 'getPlateformLogs']);
    Route::get('/activities', [ActivitiesController::class, 'getActivities']);

    Route::post('register', [RegisteredUserController::class, 'store']);
