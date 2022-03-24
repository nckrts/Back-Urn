<?php

 use App\Http\Controllers\Api\DeputadoEstadualApiController;
 use App\Http\Controllers\Api\DeputadoFederalApiController;
 use App\Http\Controllers\Api\SenadorApiController;
 use App\Http\Controllers\Api\PresidenteApiController;

 use Illuminate\Support\Facades\Route;


Route::get('Depestadual', [DeputadoEstadualApiController::class, 'index']);
Route::get('Deputadofederal', [DeputadoFederalApiController::class, 'index']);
Route::get('Senador', [SenadorApiController::class,'index']);
Route::get('Presidente', [PresidenteApiController::class,'index']);
