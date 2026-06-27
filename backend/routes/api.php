<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\CommentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class,'index']);

Route::apiResource('comments', CommentController::class)->only([
    'index',
    'store',
    'destroy'
]);

    /*
    |--------------------------------------------------------------------------
    | Organization
    |--------------------------------------------------------------------------
    */

    Route::apiResource('organizations', OrganizationController::class);

    /*
    |--------------------------------------------------------------------------
    | Tickets
    |--------------------------------------------------------------------------
    */

    Route::apiResource('tickets', TicketController::class);

});