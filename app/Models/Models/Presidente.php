<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presidente extends Model
{
    protected $table = "presidente";
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
            'numero' => 'required|unique:Presidente',
            'image' => 'image',
        ];
    }
}
