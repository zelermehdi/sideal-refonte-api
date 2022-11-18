<?php

use App\Models\activities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\PlateformLogsController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {

     $request->user()->tokens()->delete();

    return response()->json([
        'status' =>200,
        'message' =>'vous vous êtes déconnecté de votre compte via lapi'
     ]);
});

Route::get('/plateformlogs', [PlateformLogsController::class, 'getPlateformLogs']);
// creation d'une route pour afficher les activities avec un type en parametre
Route::get('/activities/{type}', [ActivitiesController::class, 'getActivities']);
route::post('/create',[ActivitiesController::class, 'Store']);




