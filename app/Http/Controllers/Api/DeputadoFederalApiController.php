<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\DeputadoFederal;
use Illuminate\Http\Request;

class DeputadoFederalApiController extends Controller
{
    public function __construct(Deputadofederal $deputadoFederal, request $request)
    {
        $this->DeputadoFederal = $deputadoFederal;
        $this->request = $request;
    }


    public function index()
    {
        $data = $this->DeputadoFederal->all();
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

        $data = DeputadoFederal::create($dataForm);

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
