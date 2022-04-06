<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\presidente;
use Illuminate\Support\Facades\Storage;


class PresidenteApiController extends Controller
{

    public function __construct(presidente $presidente, request $request)
    {
        $this->Presidente=$presidente;
        $this->request=$request;
    }

    public function index()
    {
        $data= $this->Presidente->all();
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

           // $dataForm['image']= 'C:/Users/Dev07/Back-Urn/public/storage/img/'. $uploadImage;
            $dataForm['image']= $uploadImage;
        }

        $data = Presidente::create($dataForm);

        return response()->json($data, 201);
    }


    public function show($id)
    {
        if(!$data = $this->Presidente->find($id)) {
            return response()->json(['error' => 'Nada encontrado'], 404);
        }else{
            return response()->json($data);
        }
    }

    public function update($id)
    {
        $this->Presidente->where('id', $id)->update([
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
