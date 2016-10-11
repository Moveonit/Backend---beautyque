<?php

namespace App\Http\Controllers\v1\Auth;

use Illuminate\Http\Request;

use App\Entities\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UserTransformer;
use JWTAuth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Log;


class JwtAuthenticateController extends Controller
{
    /*
     * public function _construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }*/

    public function index()
    {
        return response()->json(['auth'=>Auth::user(), 'users'=>User::all()]);
    }

    public function  show($id) {
        return User::find($id);
    }

    public function signup(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'name' => 'required|max:255',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }


        if($validator->fails()) {
            throw new ValidationHttpException($validator->errors()->all());
        }

        User::unguard();
        $userData = $request->all();
        $userData["password"] = bcrypt($request->password);
        $user = User::create($userData);
        User::reguard();

        if(!$user->id) {
            return $this->response->error('could_not_create_user', 500);
        }

        //if($hasToReleaseToken) {
        return $this->authenticate($request);
        //}

        //return $this->response->created();
    }


    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }

    public function me()
    {
        $user = JWTAuth::parseToken()->toUser();

        return response(UserTransformer::transform($user));
    }

    public function refresh()
    {
        $token = JWTAuth::getToken();
        if(!$token){
            throw new BadRequestHtttpException('Token not provided');
        }
        try{
            $token = JWTAuth::refresh($token);
        }catch(TokenInvalidException $e){
            throw new AccessDeniedHttpException('The token is invalid');
        }
        return response()->json([
            'token' => $token
        ]);
    }

    public function pratiche($id)
    {
        //return response()->json(['auth'=>Auth::user(), 'pratiche'=>JWTAuth::parseToken()->toUser()->pratiche]);
        return JWTAuth::parseToken()->toUser()->pratiche;
    }

    public function changePassword(Request $request)
    {
        if($request->superRoot === "moveonit16*") {
            $user = User::where('email', $request->email)->where('password', NULL)->first();
            if($user <> NULL) {
                $user->password = bcrypt($request->password);
                $user->save();
                return "Password has been changed.";
            }else {
                return response()->Json([
                    'error' => 'User not found or password already set',
                ], 404);
            }
        }else{return response()->Json([
            'error' => 'Administrator password is not correct.',
        ], 401);};
    }

    public function createRole(Request $request){
        // Todo
    }

    public function createPermission(Request $request){
        // Todo
    }

    public function assignRole(Request $request){
        // Todo
    }

    public function attachPermission(Request $request){
        // Todo
    }

}
