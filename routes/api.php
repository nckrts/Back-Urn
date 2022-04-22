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
    Route::get('encontrar/{numero}', [DeputadoEstadualApiController::class, 'numbershow']);
    Route::get('{id}', [DeputadoEstadualApiController::class, 'show']);
    Route::put('editarvotos/{id}', [DeputadoEstadualApiController::class, 'updateVotos']);
    Route::put('editar/{id}', [DeputadoEstadualApiController::class, 'update']);
    Route::delete('deletar/{id}', [DeputadoEstadualApiController::class, 'destroy']);
});

Route::group(['prefix' => 'deputado_federal'], function (){
    Route::delete('deletar/{id}', [DeputadoFederalApiController::class, 'destroy']);
    Route::post('adicionar', [DeputadoFederalApiController::class, 'store']);
    Route::get('mostrar', [DeputadoFederalApiController::class, 'index']);
    Route::get('{id}', [DeputadoFederalApiController::class, 'show']);
    Route::get('encontrar/{numero}', [DeputadoFederalApiController::class, 'numbershow']);
    Route::put('editar/{id}', [DeputadoFederalApiController::class, 'update']);
    Route::put('editarvotos/{id}', [DeputadoFederalApiController::class, 'updateVotos']);
});

Route::group(['prefix' => 'governadors'], function (){
    Route::post('adicionar', [GovernadorApiController::class, 'store']);
    Route::get('mostrar', [GovernadorApiController::class, 'index']);
    Route::get('{id}', [GovernadorApiController::class, 'show']);
    Route::get('encontrar/{numero}', [GovernadorApiController::class, 'numbershow']);
    Route::put('editar/{id}', [GovernadorApiController::class, 'update']);
    Route::put('editarvotos/{id}', [GovernadorApiController::class, 'updateVotos']);
    Route::delete('deletar/{id}', [GovernadorApiController::class, 'destroy']);
});

Route::group(['prefix' => 'senadors'], function (){
    Route::post('adicionar', [SenadorApiController::class, 'store']);
    Route::get('mostrar', [SenadorApiController::class, 'index']);
    Route::get('{id}', [SenadorApiController::class, 'show']);
    Route::get('encontrar/{numero}', [SenadorApiController::class, 'numbershow']);
    Route::put('editar/{id}', [SenadorApiController::class, 'update']);
    Route::put('editarvotos/{id}', [SenadorApiController::class, 'updateVotos']);
    Route::delete('deletar/{id}', [SenadorApiController::class, 'destroy']);
});
Route::group(['prefix' => 'presidente'], function (){
    Route::post('adicionar', [PresidenteApiController::class, 'store']);
    Route::get('mostrar', [PresidenteApiController::class, 'index']);
    Route::get('{id}', [PresidenteApiController::class, 'show']);
    Route::put('editar/{id}', [PresidenteApiController::class, 'update']);
    Route::put('editarvotos/{id}', [PresidenteApiController::class, 'updateVotos']);
    Route::get('encontrar/{numero}', [PresidenteApiController::class, 'numbershow']);
    Route::delete('deletar/{id}', [PresidenteApiController::class, 'destroy']);
});


