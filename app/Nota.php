<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'titulo',
        'texto',
        'contato_id',
    ];

    public function contato()
    {
        return $this->belongsTo(Contato::class, 'contato_id');
    }
}
