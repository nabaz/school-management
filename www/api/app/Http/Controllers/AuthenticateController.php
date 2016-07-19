<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthenticateController extends Controller
{

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (empty($credentials['email'])) {
                return response()->json(['error' => 'Email cannot be empty...'], 401);
            }
            if (empty($credentials['password'])) {
                return response()->json(['error' => 'Password cannot be empty...'], 401);
            }
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'The email and password do not match'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function refreshToken(Request $request) {
        try {
            $token = JWTAuth::parseToken()->refresh();
            return response()->json(compact('token'))->header('Authorization', 'Bearer ' . $token);
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], 401);
        } catch (JWTException $e) {
            return response()->json(['token_expired'], 401);
        }
    }

    public function registerUser(Request $request)
    {

        return User::create([
            'name' => Input::get('name'),
            'email' => Input::get('email'),
            'password' => bcrypt(Input::get('password')),
            'role' => Input::get('role'),
            'status' => 'active',
        ]);

    }
}