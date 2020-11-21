<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; /// gerenciador de DB

class Endereco extends Model
{
    protected $table = 'enderecos';
    
    // informações que o user pode salvar no DB 
    protected $fillable = [
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
    ];
}
