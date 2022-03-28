<?php

 use App\Http\Controllers\Api\DeputadoEstadualApiController;
 use App\Http\Controllers\Api\DeputadoFederalApiController;
 use App\Http\Controllers\Api\SenadorApiController;
 use App\Http\Controllers\Api\PresidenteApiController;
 use App\Http\Controllers\Api\GovernadorApiController;
 use app\Http\Controllers\Controller;


 use Illuminate\Support\Facades\Route;


Route::get('Depestadual', [Controller::class, 'index']);
Route::get('Deputadofederal', [Controller::class, 'index']);

Route::group('senador/'
    Route::get('', [Controller::class, 'insert']);
    Route::get('{id}', [Controller::class, 'delete']);
    Route::put('{id}', [Controller::class, 'update']);
    Route::get('{id}', [Controller::class, 'show']);

;
Route::get('Governador', [Controller::class,'index']);
Route::get('Presidente', [Controller::class,'index']);

