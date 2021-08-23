<?php

namespace App\Http\Controllers\api;

//use App\Http\Controllers\api\Controller;

use App\Http\Traits\ApiResponse;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Hash;


class LoginApi extends Controller
{


    use ApiResponse;


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

        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->apiResponse(401, 'Unauthorized');

        }
        return $this->respondWithToken($token);


    }

    public function me()
    {
        // $userAuth=  auth()->user();
        try {

            $user = auth()->userOrFail();
           

            $user_id = $user->id;
            
            $user_data = $user->whereHas('subscribes', function ($q) use ($user_id) {
                return $q->where('user_id', $user_id);

            })->with('subscribes.user2','subscribes.paymentSetting')->get();
           

        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return response()->json(['error' => $e->getMessage()]);
        }

        // return  $user ;
        if (count($user_data) > 0) {

            return $this->apiResponse(200, 'Current User Data', null, $user_data);
        }
       

       /*$data_not_subscribe=$user->where('id',$user->id)->with('subscribes')->get();*/
       
       
       
        $data = [[
            'name' => $user->name,
            'code' => $user->code,
            'phone' => $user->phone,
            'station' => $user->getStations->name,
            'group_name' => $user->getGroup->name,
            'group' => $user->group_id,
            'parent_phone' => $user->parent_phone,
            'faculty' => $user->faculty,
        
            'is_active'=>$user->is_active,
            'notes'  =>$user->notes,
            'subscribes'=>null
            
            ]];
        
        return $this->apiResponse(402, 'Not...current user not have any subscribe ', null, $data);

    }


    public function logout()
    {
        auth()->logout();

        return $this->apiResponse(200, 'Successfully logged out');
    }


    public function refresh()
    {
        $newToken = auth()->refresh();

        return $this->apiResponse(200, 'token refreshed successfully', null, $newToken);
//        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token)
    {

        $user = auth()->user();

        $data = [
            'name' => $user->name,
            'code' => $user->code,
            'phone' => $user->phone,
            'station' => $user->getStations->name,
            'group_name' => $user->getGroup->name,
            'group' => $user->group_id,
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
