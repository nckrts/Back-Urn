<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\presidente;



class PresidenteApiController extends Controller
{

    public function __construct(presidente $presidente, request $request)
    {
        $this->presidente=$presidente;
        $this->request=$request;
    }


    public function index()
    {
        $data= $this->presidente->all();
        dd($data);
        return response()->json('PresidenteApiController');
    }
}
