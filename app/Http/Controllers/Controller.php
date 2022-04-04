<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\DeputadoFederalApiController;
use App\Http\Controllers\Api\DeputadoEstadualApiController;
use App\Http\Controllers\Api\GovernadorApiController;
use App\Http\Controllers\Api\SenadorApiController;
use App\Http\Controllers\Api\PresidenteApiController;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

}
