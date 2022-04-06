<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\DeputadoFederal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

//            $dataForm['image']= 'C:/Users/Dev07/Back-Urn/public/storage/img/'. $uploadImage;
             $dataForm['image']= $uploadImage;
        }

        $data = DeputadoFederal::create($dataForm);

        return response()->json($data, 201);
    }


    public function show($id)
    {
        if(!$data = $this->DeputadoFederal->find($id)) {
            return response()->json(['error' => 'Nada encontrado'], 404);
        }else{
            return response()->json($data);
        }
    }


    public function update($id)
    {
        $this->DeputadoFederal->where('id', $id)->update([
            'nome'=> $this->request['nome'],
            'partido'=> $this->request['partido'],
            'numero'=> $this->request['numero']
        ]);

        return $this->request;
    }


    public function destroy($id)
    {
        if(!$data = $this->Senador->find($id))
            return response()->json(['error' => 'Nada encontrado'], 404);
        if($data->image){
            Storage::disk('public')->delete("/img/$data->image");
        }

        $data->delete();
        return response()->json(['sucess'=>'Deletado com sucesso!']);

    }
}
