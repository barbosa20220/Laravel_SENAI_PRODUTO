<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $fillable = [
        'nome',
        'Setor'
    ];

    // Um setor tem vários produtos
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}