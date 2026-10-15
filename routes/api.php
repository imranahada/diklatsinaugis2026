<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/SK_144_MENHUT_II_2014', [ApiController::class, 'geojson_SK_144_MENHUT_II_2014'])->name('api.geojson.SK_144_MENHUT_II_2014');