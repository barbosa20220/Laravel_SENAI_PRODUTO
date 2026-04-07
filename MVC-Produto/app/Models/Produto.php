<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Produto extends Model{
    protected $fillable = [
        'nome',
        'quantidade',
        'preco'
    ];

    // relacionamento produto - setor

    // relacionamento produto - detalhe produto
}