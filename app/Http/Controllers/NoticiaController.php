<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Noticia;

class NoticiaController extends Controller
{
    public function listar(){        
        $news = App\Noticia::all();
        return view('noticias/index', ['news' => $news]);

    }
}
