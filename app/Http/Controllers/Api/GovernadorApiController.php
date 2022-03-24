<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\governador;
use Illuminate\Http\Request;

class GovernadorApiController extends Controller
{
    public function __construct(governador $governador, request $request)
    {
        $this->governador = $governador;
        $this->request = $request;
    }


    public function index()
    {
        $data = $this->governador->all();
        return response()->json($data);
    }
}
