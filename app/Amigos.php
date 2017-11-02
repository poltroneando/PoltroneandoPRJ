<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amigos extends Model
{
    public $timestamps = false;
    public $primaryKey = 'id_amigos';

    public function solicitante()
    {
        return $this->belongsTo('App\Usuario','id_solicitante');
    }
    public function solicitado()
    {
        return $this->belongsTo('App\Usuario','id_solicitado');
    }
    
}
