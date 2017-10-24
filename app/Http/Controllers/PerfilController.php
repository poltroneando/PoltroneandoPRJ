<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Imgurx;
use Auth;

class PerfilController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(){
		//dd(Auth::user());
        return view('profile/index', array('user' => Auth::user()));
	}
	
	public function profile_by_uuid($uuid){
		return var_dump($uuid);
	}

    public function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
			$client = new \Imgur\Client();
			$client->setOption('client_id', 'e32cdf713264617');
			$client->setOption('client_secret', '4afcf9c0c754db308acc83c9d396c8d5f6f06c28');
			$avatar = $request->file('avatar');
			$imageData = [
				'image' => $avatar,
				'type' => 'file',
			];
			$res = $client->api('image')->upload($imageData);
    		$user = Auth::user();
			if ($user->foto <> 'defaut.png'){
			}
    		$user->foto = $res->getData()['link'];
    		$user->save();
    	}
    	return view('profile/index', array('user' => Auth::user()) );
	}
	public function editar(){
		return view('profile/editar', array('user' =>Auth::user()));
	}
}
