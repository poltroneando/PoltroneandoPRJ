<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_noticia extends Model
{
    public $table = 'news_categories';
    public function noticias()
    {
        return $this->hasMany('App\Noticia');
    }

}
