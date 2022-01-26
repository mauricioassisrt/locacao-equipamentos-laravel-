<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model {

    //campos do banco de dados 
    protected $fillable = [
        'nome', 'email', 'user_id',
        'endereco', 'cidade', 'estado', 'cep', 'cnpj', 'cpf',
        'rg', 'ie', 'lat' , 'lng'
    ];

    //um usuario possue muitas empresas 1 empresa possui 1 usuario !
    public function user() {
        return $this->belongsTo(User::class);
    }

}
