<?php

use App\Http\Controllers\Api\AdController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DomainController;
use App\Http\Controllers\Api\MesaageController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\DistrictController;

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


## ---------------------------------- AUTH MODULE 
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

## ---------------------------------- SETTINGS MODULE 
Route::get('/settings', SettingController::class);

## ---------------------------------- CITIES MODULE 
Route::get('/cities', CityController::class);

## ---------------------------------- DISTRICTS MODULE 
Route::get('/districts', DistrictController::class);

## ---------------------------------- MESSAGES MODULE 
Route::post('/message', MesaageController::class);

## ---------------------------------- DOMAINS MODULE 
Route::get('/domains', DomainController::class);

## ---------------------------------- ADS MODULE 
Route::prefix('ads')->controller(AdController::class)->group(function () {
    // basic
    Route::get('/', 'index');
    Route::get('/latest', 'latest');
    Route::get('/domain/{domain_id}', 'domain');
    Route::get('/search', 'search');
    // User API ads endpoint
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('create', 'create');
        Route::post('update/{adId}', 'update');
        Route::get('delete/{adId}', 'delete');
        Route::get('myads', 'myads');
    });
});
