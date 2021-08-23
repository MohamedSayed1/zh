<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use App\Http\Traits\ApiResponse;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Hash;


class AuthController extends Controller
{

    use ApiResponse;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {

        $req = Validator::make($request->all(), [
            'code' => 'required',
            'password' => 'required|string|min:5',
        ]);

        if ($req->fails()) {
            return $this->apiResponse(422, 'ValidatorErrors', $req->errors());
        }

        $credentials = $request->only('code', 'password');

        if ($token = JWTAuth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return $this->apiResponse(401, 'Unauthorized');


    }

    protected function respondWithToken($token)
    {

        $user = auth()->user();

        $data = [
            'name' => $user->name,
            'code' => $user->code,
            'phone' => $user->phone,
            'station' => $user->getStations->name,
            'group' => $user->getGroup->name,
            'parent_phone' => $user->parent_phone,
            'faculty' => $user->faculty,
            'token' => $token,
        ];
        return $this->apiResponse(200, 'User data', null, $data);

        /*return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);*/
    }

}
