<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Governador;
use Illuminate\Http\Request;

class GovernadorApiController extends Controller
{
    public function __construct(Governador $governador, request $request)
    {
        $this->governador = $governador;
        $this->request = $request;
    }


    public function index()
    {
        $data = $this->governador->all();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        $dataForm = $request->all();

        if($request->hasfile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $uploadImage = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('storage/img'), $uploadImage);

            $dataForm['image']= 'C:/Users/Dev07/Back-Urn/public/storage/img/'. $uploadImage;

        }

        $data = Governador::create($dataForm);

        return response()->json($data, 201);
    }
    public function show($id)
    {
        return response()->json('show');
    }


    public function edit($id)
    {
        return response()->json('edit');
    }


    public function destroy($id)
    {
        return response()->json('destroy');
    }
}
