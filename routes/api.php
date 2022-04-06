<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\DeputadoEstadualApiController;
use App\Http\Controllers\Api\DeputadoFederalApiController;
use App\Http\Controllers\Api\GovernadorApiController;
use App\Http\Controllers\Api\PresidenteApiController;
use App\Http\Controllers\Api\SenadorApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'deputado_estadual'], function (){
    Route::post('adicionar', [DeputadoEstadualApiController::class, 'store']);
    Route::get('mostrar', [DeputadoEstadualApiController::class, 'index']);
    Route::get('{id}', [DeputadoEstadualApiController::class, 'show']);
    Route::put('editar/{id}', [DeputadoEstadualApiController::class, 'update']);
    Route::delete('{id}', [DeputadoEstadualApiController::class, 'destroy']);
});

Route::group(['prefix' => 'deputado_federal'], function (){
    Route::delete('{id}', [DeputadoFederalApiController::class, 'destroy']);
    Route::post('adicionar', [DeputadoFederalApiController::class, 'store']);
    Route::get('mostrar', [DeputadoFederalApiController::class, 'index']);
    Route::get('{id}', [DeputadoFederalApiController::class, 'show']);
    Route::put('editar/{id}', [DeputadoFederalApiController::class, 'update']);
});

Route::group(['prefix' => 'governadors'], function (){
    Route::post('adicionar', [GovernadorApiController::class, 'store']);
    Route::get('mostrar', [GovernadorApiController::class, 'index']);
    Route::get('{id}', [GovernadorApiController::class, 'show']);
    Route::put('editar/{id}', [GovernadorApiController::class, 'update']);
    Route::delete('{id}', [GovernadorApiController::class, 'destroy']);
});

Route::group(['prefix' => 'senadors'], function (){
    Route::post('adicionar', [SenadorApiController::class, 'store']);
    Route::get('mostrar', [SenadorApiController::class, 'index']);
    Route::get('{id}', [SenadorApiController::class, 'show']);
    Route::put('editar/{id}', [SenadorApiController::class, 'update']);
    Route::delete('{id}', [SenadorApiController::class, 'destroy']);
});
Route::group(['prefix' => 'presidente'], function (){
    Route::post('adicionar', [PresidenteApiController::class, 'store']);
    Route::get('mostrar', [PresidenteApiController::class, 'index']);
    Route::get('{id}', [PresidenteApiController::class, 'show']);
    Route::put('editar/{id}', [PresidenteApiController::class, 'update']);
    Route::delete('{id}', [PresidenteApiController::class, 'destroy']);
});


