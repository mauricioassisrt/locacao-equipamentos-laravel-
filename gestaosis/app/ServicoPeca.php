<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicoPeca extends Model {

    //campos do banco de dados 
    protected $fillable = [
        'quantidade', 'servico_id', 'peca_id', 
        'valorSomaIten'
    ];

    //um usuario possue muitas equipaments 1 equipaments possui 1 usuario !


    public function servico() {
        return $this->belongsTo(Servico::class);
    }

    public function peca() {
        return $this->belongsTo(Peca::class);
    }

}
