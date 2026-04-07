<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class DetalheProduto extends Model
{
  protected $fillable = [
        'descricao',
        'validade',
        'fabricante',
        'produto_id'
    ];
     public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
