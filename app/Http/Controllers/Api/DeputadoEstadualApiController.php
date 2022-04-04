<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\DeputadoEstadual;

class DeputadoEstadualApiController extends Controller
{
    public function __construct(DeputadoEstadual $deputadoEstadual, request $request)
    {
        $this->DeputadoEstadual = $deputadoEstadual;
        $this->request = $request;
    }


    public function index()
    {
        $data = $this->DeputadoEstadual->all();
        return response()->json($data);
    }
    public function store(Request $request)
    {
//        $this->request->validate(DeputadoEstadual::rules(), $request->all());
        $dataForm = $request->all();

        if($request->hasfile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $uploadImage = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('storage/img'), $uploadImage);

            $dataForm['image']= 'C:/Users/Dev07/Back-Urn/public/storage/img/'. $uploadImage;

    }


        $data = DeputadoEstadual::create($dataForm);

        return response()->json($data, 201);
    }


    public function show($id)
    {
        $data = $this->DeputadoEstadual->find($id);
        return response()->json($data);
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
