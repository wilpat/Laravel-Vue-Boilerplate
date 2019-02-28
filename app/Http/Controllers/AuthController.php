<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $r)
    {	
    	// dd($r->all());
    	$v = Validator::make($r->all(), [
            'name' => 'required',
    		'email' => 'required | email | unique:users',
    		'password' => 'required | min:3 | confirmed'
    	]);

    	if( $v->fails())
    	{
    		return response()->json([
    			'status' => 'error',
    			'errors' => $v->errors()
    		], 422);
    	}

    	$user = new User;
        $user->name = $r->name;
    	$user->email = $r->email;
    	$user->password = bcrypt($r->password);
    	$user->save();

        $token = auth()->login($user);

        return $this->respondWithToken($token);

    	return response()->json(['status' => 'success'], 200);
    }

    public function login(Request $r)
    {
        $credentials = $r->only('email', 'password');
        // dd($credentials);
        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 600,
        ])->header('Authorization', $token);
    }

    public function logout()
    {
    	$this->guard()->logout();

    	return response()->json([
    		'status' => 'success',
    		'msg' => 'Logged out successfully'
    	], 200);
    }

    public function user(Request $r)
    {
    	$user = User::find(Auth::user()->id);

    	return response()->json([
    		'status' => 'success',
    		'data' => $user
    	]);
    }

    public function refresh()
    {
    	// will refresh the token if it has expired. It is possible to define the duration of validity of the token in the file ‘config / jwt.php’.
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
