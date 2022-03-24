<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\senador;

class SenadorApiController extends Controller
{
    public function __construct(senador $senador, request $request)
    {
        $this->senador = $senador;
        $this->request = $request;
    }


    public function index()
    {
        $data = $this->senador->all();
        dd($data);
        return response()->json('SenadorApiController');
    }
}
