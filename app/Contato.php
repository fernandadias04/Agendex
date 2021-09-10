<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class Contato extends Model
{

    protected $fillable = [
        'nome', 'telefone', 'foto'
    ];

}
