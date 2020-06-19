<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use App\Transformer\UserTransformer;
use Auth;



class UserController extends Controller
{
    public function users(User $user){
        $users = $user->all();
        $users = fractal($users, new UserTransformer())->toArray();
        return response()->json($users); 
    }

    public function register(Request $request, User $user){
    	$this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:2', 'confirmed'],
        ]);

        $users = User::create([
        				'name' => $request->name,
        				'email' => $request->email,
        				'api_token' => bcrypt($request->email), 
        				'password' => bcrypt($request->password),
        		]);
        return fractal()
        		->item($users)
        		->transformWith(new UserTransformer)
        		->addMeta(['token' => $users->api_token])
        		->toArray(); 
    }

    public function login(Request $request, User $user){
    	if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json(['error' => 'email dan password tidak cocok', 401]);
        }

        $users = $user->find(Auth::user()->id);
        return fractal()
            ->item($users)
            ->transformWith(new UserTransformer)
            ->addMeta([
                'token' => $users->api_token
            ])
            ->toArray();
    }
}
