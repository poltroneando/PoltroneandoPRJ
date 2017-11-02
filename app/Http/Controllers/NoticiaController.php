<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Noticia;

class NoticiaController extends Controller
{
    public function listar(){        
        $news = Noticia::paginate(20);
        return view('noticias/index', ['news' => $news]);

    }
}
