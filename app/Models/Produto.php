<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';

    protected $fillable = ['nome', 'descricao', 'preco', 'pesoEstoque','PesoLimite', 'validade', 'categoria_id', 'imagem'];

    protected $casts = [
        'validade' => 'date',
        'preco' => 'float',
        'pesoEstoque' => 'float',
        'pesoLimite' => 'float',
        'categoria_id' => "integer",

    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

}
