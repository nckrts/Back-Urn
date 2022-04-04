<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senador extends Model
{
    protected $table = "senadors";
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
            'numero' => 'required|unique:Senador',
            'image' => 'image',
        ];
    }
}
