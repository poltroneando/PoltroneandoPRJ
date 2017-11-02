<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site_Origem extends Model
{
    public $table = 'news_sites';
    public function noticias()
    {
        return $this->hasMany('App\Noticia');
    }
}
