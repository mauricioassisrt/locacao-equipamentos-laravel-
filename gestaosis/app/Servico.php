<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model {

    //campos do banco de dados 
    protected $fillable = [
        'data', 'totalpecas', 'equipamento_id',
        'maodeobra', 'valorFinal', 'itens'
    ];

    //um usuario possue muitas equipaments 1 equipaments possui 1 usuario !


    public function equipamento() {
        return $this->belongsTo(Equipamento::class);
    }

}
