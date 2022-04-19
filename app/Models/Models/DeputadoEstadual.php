<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeputadoEstadual extends Model
{
    protected $table = "deputado_estadual";
    protected $fillable = [
        'nome',
        'partido',
        'numero',
        'image',
        'votos',
    ];

    public static function rules(){
      return  [
        'nome' => 'required',
        'partido' => 'required',
        'numero' => 'required|unique:DeputadoEstadual',
        'image' => 'image',
        ];
    }
}
