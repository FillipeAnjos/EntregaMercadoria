<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntregaModel extends Model
{
    protected $fillable = ['nome', 'data_entrega', 'endereco_partida', 'endereco_destino'];
    
    protected $table = "entrega";
}
