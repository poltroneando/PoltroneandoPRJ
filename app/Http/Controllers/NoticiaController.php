<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Noticia;

class NoticiaController extends Controller
{
    public function listar(){        
        $news = Noticia::orderBy('time_and_date', 'desc')->paginate(15);
        return view('noticias/index', ['news' => $news]);

    }
}
