<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ThreadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/**
 * Lista di Threads
 */
//Route::get('v1/threads',[ThreadController::class, 'list']);
//Route::get('v1/threads/{id}',[ThreadController::class, 'detail']);
//Route::get('v1/threads/{thread}',[ThreadController::class, 'detail']);

/**
 * Tutte le rotte
 */
Route::apiResource(name: 'v1/threads', controller: ThreadController::class);
