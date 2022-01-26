<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locador extends Model {

    protected $fillable = [
        'nome', 'email', 'user_id', 'telefone',
        'endereco', 'cidade', 'estado', 'cep', 'cnpj', 'cpf',
        'rg', 'ie', 'obs',
    ];

    //um usuario possue muitas empresas 1 empresa possui 1 usuario !
    public function user() {
        return $this->belongsTo(User::class);
    }

}
