<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PerfilController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile(){
        return view('profile/index', array('user' => Auth::user()));
    }
     public function update_avatar(Request $request){
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
    		$user = Auth::user();
			if ($user->avatar <> 'defaut.png'){
				if (file_exists(public_path().'/uploads/avatars/'.$user->avatar)){
					File::delete(public_path().'/uploads/avatars/'.$user->avatar);
				}
			}
    		$user->avatar = $filename;
    		$user->save();
    	}
    	return view('profile/index', array('user' => Auth::user()) );
    }
}
