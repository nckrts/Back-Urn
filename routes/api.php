<?php

use App\Http\Controllers\Api\Controllermaster;
use App\Http\Controllers\Api\DeputadoEstadualApiController;
use App\Http\Controllers\Api\DeputadoFederalApiController;
use App\Http\Controllers\Api\GovernadorApiController;
use App\Http\Controllers\Api\PresidenteApiController;
use App\Http\Controllers\Api\SenadorApiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'deputado_estadual'], function (){
    Route::post('adicionar', [DeputadoEstadualApiController::class, 'store']);
    Route::get('mostrar', [DeputadoEstadualApiController::class, 'index']);
    Route::put('atualizar', [DeputadoEstadualApiController::class, 'update']);
    Route::delete('Deletar', [DeputadoEstadualApiController::class, 'destroy']);
});

Route::group(['prefix' => 'deputado_federal'], function (){
    Route::post('adicionar', [DeputadoFederalApiController::class, 'store']);
    Route::get('mostrar', [DeputadoFederalApiController::class, 'index']);
    Route::put('atualizar', [DeputadoFederalApiController::class, 'update']);
    Route::delete('Deletar', [DeputadoFederalApiController::class, 'destroy']);
});

Route::group(['prefix' => 'governadors'], function (){
    Route::post('adicionar', [GovernadorApiController::class, 'store']);
    Route::get('mostrar', [GovernadorApiController::class, 'index']);
    Route::put('atualizar', [GovernadorApiController::class, 'update']);
    Route::delete('Deletar', [GovernadorApiController::class, 'destroy']);
});

Route::group(['prefix' => 'senadors'], function (){
    Route::post('adicionar', [SenadorApiController::class, 'store']);
    Route::get('mostrar', [SenadorApiController::class, 'index']);
    Route::put('atualizar', [SenadorApiController::class, 'update']);
    Route::delete('Deletar', [SenadorApiController::class, 'destroy']);
});
Route::group(['prefix' => 'presidente'], function (){
    Route::post('adicionar', [PresidenteApiController::class, 'store']);
    Route::get('mostrar', [PresidenteApiController::class, 'index']);
    Route::put('atualizar', [PresidenteApiController::class, 'update']);
    Route::delete('Deletar', [PresidenteApiController::class, 'destroy']);
});


