<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    public $timestamps = false;
    public $table = 'usuario';
    public $primaryKey = 'id_usuario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password','foto', 'link_facebook','uuid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function solicitacao()
    {
        return $this->hasMany('App\Amigos','id_solicitante');
    }
    public function requisicao()
    {
        return $this->hasMany('App\Amigos','id_socilitado');
    }
}
