<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model {

    //campos do banco de dados 
    protected $fillable = [
        'nome', 'descricao', 'user_id',
        'status', 'codigo', 'idusuario','aquisicao', 'valor'
    ];

    //um usuario possue muitas equipaments 1 equipaments possui 1 usuario !
    public function user() {
        return $this->belongsTo(User::class);
    }

}
