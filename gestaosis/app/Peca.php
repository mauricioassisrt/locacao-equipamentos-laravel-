<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peca extends Model {

    //campos do banco de dados 
    protected $fillable = [
        'nome', 'descricao', 'empresa_id',
        'preco'
    ];

    //um usuario possue muitas equipaments 1 equipaments possui 1 usuario !


    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

}
