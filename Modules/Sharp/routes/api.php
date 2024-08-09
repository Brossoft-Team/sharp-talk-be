<?php

use Illuminate\Support\Facades\Route;
use Modules\Sharp\app\Http\Controllers\SharpController;
use Modules\Sharp\app\Http\Controllers\JudgmentController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::get("/sharps",[SharpController::class,"get"])->name("sharps.get");
Route::get("/sharps/{sharp}",[SharpController::class,"getOne"])->name("sharps.getOne");

Route::get("/sharps/{sharp}/judgments",[JudgmentController::class,"get"])->name("sharps.judgments.get");
Route::get("/sharps/{sharp}/judgments/{judgment}",[JudgmentController::class,"getOne"])->name("sharps.judgments.getOne");

Route::middleware("auth:sanctum")->prefix("/sharps")->as("sharps.")->group(function (){
    Route::post("/",[SharpController::class,"store"])->name("store");
    Route::prefix("/{sharp}")->group(function (){
        Route::delete("/",[SharpController::class,"delete"])->name("delete");
        Route::prefix("/judgments")->as("judgments.")->group(function (){
            Route::post("/",[JudgmentController::class,"store"])->name("store");
            Route::delete("/{judgment}",[JudgmentController::class,"delete"])->name("delete");
        });
    });

});
