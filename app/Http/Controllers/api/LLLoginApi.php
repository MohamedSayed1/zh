<?php
//
//
//namespace App\Http\Controllers\api;
//
//use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Controller;
//
//class LoginApi extends Controller
//{
//
//    public function login()
//    {
//        $credentials = request(['code', 'password']);
//
//        if (! $token = auth('api')->attempt($credentials)) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
//
//        return $this->respondWithToken($token);
//    }
//
//
//    public function me()
//    {
//        return response()->json(auth()->user());
//    }
//
//
//    /**
//     * Log the user out (Invalidate the token).
//     *
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function logout()
//    {
//        auth()->logout();
//
//        return response()->json(['message' => 'Successfully logged out']);
//    }
//
//    /**
//     * Refresh a token.
//     *
//     * @return \Illuminate\Http\JsonResponse
//     */
//    public function refresh()
//    {
//        return $this->respondWithToken(auth()->refresh());
//    }
//
//    protected function respondWithToken($token)
//    {
//        return response()->json([
//            'access_token' => $token,
//            'data' => auth('api')->user(),
//            'token_type' => 'bearer',
//           // 'expires_in' => auth()->factory()->getTTL() * 60
//        ]);
//    }
//}
