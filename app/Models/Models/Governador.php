<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governador extends Model
{
    protected $table = "governadors";
    protected $fillable = [
        'nome',
        'ocupacao',
        'partido',
        'numero',
        'image',
        'votos',
    ];

    public function rules(){
        return  [
            'nome' => 'required',
            'ocupacao' => 'string',
            'partido' => 'required',
            'numero' => 'required|unique:Governador',
            'image' => 'image',
        ];
    }
}
