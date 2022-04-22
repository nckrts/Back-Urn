<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Models\senador;
use Illuminate\Support\Facades\Storage;


class SenadorApiController extends Controller
{
    public function __construct(Senador $senador, request $request)
    {
        $this->Senador = $senador;
        $this->request = $request;
    }


    public function index()
    {
        $data = $this->Senador->all();
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

            //$dataForm['image']= 'C:/Users/Dev07/Back-Urn/public/storage/img/'. $uploadImage;
            $dataForm['image']= $uploadImage;
        }
        $data = Senador::create($dataForm);

        return response()->json($data, 201);
    }


    public function numbershow($numero)
    {
        if(!$data = $this->Senador->where('numero', $numero)->first()) {
            return response()->json(['error' => 'Nada encontrado'], 404);
        }else{
            return response()->json($data);
        }
    }

    public function destroy($id)
    {
        if(!$data = $this->Senador->find($id))
            return response()->json(['error' => 'Nada encontrado'], 404);

        if($data->image)
        Storage::disk('public')->delete("/img/$data->image");


    $data->delete();
        return response()->json(['sucess'=>'Deletado com sucesso!']);

    }

    public function update($id)
    {
        $this->Senador->where('id', $id)->update([
            'nome'=> $this->request['nome'],
            'partido'=> $this->request['partido'],
            'numero'=> $this->request['numero']
            ]);

        return $this->request;
    }

    public function updateVotos($id)
    {
        $votos = $this->Senador::select('votos')->where('id', $id)->first();

        $this->Senador::where('id', $id)->update(['votos' => $votos['votos'] + 1]);
    }

}
