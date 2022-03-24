<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Deputado_federal;
use Illuminate\Http\Request;

class DeputadoFederalApiController extends Controller
{
    public function __construct(Deputado_federal $DeputadoFederal, request $request)
    {
        $this->DeputadoFederal = $DeputadoFederal;
        $this->request = $request;
    }


    public function index()
    {
        $data = $this->DeputadoFederal->all();
        dd($data);
        return response()->json('DeputadoFederalApiController');
    }
}
