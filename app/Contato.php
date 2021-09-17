<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Contato extends Model
{

    protected $fillable = [
        'nome',
        'telefone',
        'foto',
        'user_id',
    ];

     public function notas()
    {
       return $this->hasMany(\App\Nota::class, 'contato_id');
    }

}

