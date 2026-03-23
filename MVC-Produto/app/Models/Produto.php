<?php

namespace App\Models;

use Illuminate\Database\Eloaquent\Model;
class Produto extends Model{
    protected $fillable = [
        'nome',
        'quantidade',
        'preco'
    ];
}