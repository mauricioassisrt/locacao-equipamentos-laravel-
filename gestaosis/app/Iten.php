<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iten extends Model
{
     //campos do banco de dados 
    protected $fillable = [
        'vencimento', 'data_aluguel', 'equipamento_id', 'periodo_id',
        'locador_id', 'forma_pagamento_id', 'endereco', 'cep', 'status', 'lat', 'lng'
        
    ];
 

    public function equipamento() {
        return $this->belongsTo(Equipamento::class);
    }
     public function formapagamento() {
        return $this->belongsTo(FormaPagamento::class);
    }
     public function periodo() {
        return $this->belongsTo(Periodo::class);
    }
     public function locador() {
        return $this->belongsTo(Locador::class);
    }
}
