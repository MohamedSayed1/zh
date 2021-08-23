<?php

namespace App\Http\Controllers\api;

use App\Http\Traits\ApiResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponse;

    public function __construct()
    {
        auth()->setDefaultDriver('api');
        $this->middleware('api', ['except' => ['login']]);


    }

    public function checkUserAuth()
    {
        try {
            $user = auth()->userOrFail();
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            return $this->apiResponse(401, $e->getMessage());
        }

        return  $user ;
    }

    public function checkTokenInvalid()
    {
        try {
            $tokenRefresh = auth()->refresh();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return $this->apiResponse(401, $e->getMessage());
        }
        return $tokenRefresh;

    }

}
