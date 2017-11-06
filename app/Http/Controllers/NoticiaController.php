<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Noticia;

class NoticiaController extends Controller
{
    public function listar(){        
        $news = Noticia::orderBy('date_and_time', 'desc')->paginate(15);
        return view('noticias/index', ['news' => $news]);

    }
}
