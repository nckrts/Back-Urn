<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeputadoFederal extends Model
{
    protected $table = "deputado_federal";
    protected $fillable = [
        'nome',
        'partido',
        'numero',
        'image',
        'votos',
    ];

    public function rules(){
        return  [
            'nome' => 'required',
            'partido' => 'required',
            'numero' => 'required|unique:DeputadoFederal',
            'image' => 'image',
        ];
    }
}
