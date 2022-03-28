<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\deputado_estadual;

class DeputadoEstadualApiController extends Controller
{
    public function __construct(deputado_estadual $DeputadoEstadual, request $request)
    {
        public var
        $this->DeputadoEstadual = $DeputadoEstadual;
        $this->request = $request;
    }


    public function index()
    {
        $data = $this->DeputadoEstadual->all();
        return response()->json($data);
    }
}
