<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PropertyController;

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

Route::get('properties/suburb-summary/{suburb}', [PropertyController::class, 'suburbSummary']);
Route::get('properties/state-summary/{state}', [PropertyController::class, 'stateSummary']);
Route::get('properties/country-summary/{country}', [PropertyController::class, 'countrySummary']);
