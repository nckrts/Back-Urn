<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Models\Governador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

           // $dataForm['image']= 'C:/Users/Dev07/Back-Urn/public/storage/img/'. $uploadImage;
            $dataForm['image']= $uploadImage;
        }

        $data = Governador::create($dataForm);

        return response()->json($data, 201);
    }
    public function show($id)
    {
        if(!$data = $this->governador->find($id)) {
            return response()->json(['error' => 'Nada encontrado'], 404);
        }else{
            return response()->json($data);
        }
    }

    public function updateVotos($id)
    {
        $votos = $this->governador::select('votos')->where('id', $id)->first();
        $this->governador::where('id', $id)->update(['votos' => $votos['votos'] + 1]);
    }


    public function update($id)
    {
        $this->governador->where('id', $id)->update([
            'nome'=> $this->request['nome'],
            'partido'=> $this->request['partido'],
            'numero'=> $this->request['numero']
        ]);

        return $this->request;
    }


    public function destroy($id)
    {
        if(!$data = $this->governador->find($id))
            return response()->json(['error' => 'Nada encontrado'], 404);
        if($data->image){
            Storage::disk('public')->delete("/img/$data->image");
        }

        $data->delete();
        return response()->json(['sucess'=>'Deletado com sucesso!']);

    }
    public function numbershow($numero)
    {
        if(!$data = $this->governador->where('numero', $numero)->first()) {
            return response()->json(['error' => 'Nada encontrado'], 404);
        }else{
            return response()->json($data);
        }
    }
}
