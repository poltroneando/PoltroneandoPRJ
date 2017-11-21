<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $table = 'news';
    protected $dates = ['created_at', 'updated_at', 'time_and_date'];
    //protected $dateFormat = 'd-m-Y';
    public function site_origem()
    {
        return $this->belongsTo('App\Site_Origem','news_site_id');
    }    
    public function categoria_noticia()
    {
        return $this->belongsTo('App\Categoria_noticia');
    }
}
