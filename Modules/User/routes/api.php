<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \Modules\User\App\Http\Controllers\Api\UserController as ApiUserController;

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



Route::prefix("/auth")->as("auth.")->group(function (){
    Route::post("/login",[ApiUserController::class,"login"])->name("login");
    Route::post("/register",[ApiUserController::class,"register"])->name("register");

    Route::middleware(['auth:sanctum','verified'])->group(function () {
        Route::get("/profile",[ApiUserController::class,"profile"])->name("profile");
        Route::post("/profile",[ApiUserController::class,"profile_post"])->name("profile_post");
    });
});
