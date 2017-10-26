<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Imgurx;
use App\Usuario;
use Auth;

class PerfilController extends Controller
{
	public function __construct()
    {
        //$this->middleware('auth');
	}
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'nome' => 'required|max:255',
			'password' => 'required|min:6|confirmed',
			'username' => 'max:60|unique|alpha_num',
			'data_nascimento' => 'date',
        ]);
    }
    public function profile(){
		//dd(Auth::user());
        return view('profile/index', array('user' => Auth::user()));
	}
	public function gravar(Request $data){
		$user = Auth::user();
		$user->password = bcrypt($data['password']);
		$user->nome = $data['nome'];
		$user->username = $data['username'];
		$user->save();
		profile();
	}
	public function profile_by_uuid($uuid){
		return view('profile/index', array('user' => Usuario::where('uuid',$uuid)->firstOrFail()));
		//return var_dump($uuid);
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
