<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserCollection;
use App\Models\User;
use App\Repositories\DataDiri\DataDiriRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Laravel\Sanctum\PersonalAccessToken;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    protected $user;
    public $userRepository,$dataDiriRepository;
    public function __construct(User $user, UserRepository $userRepository,DataDiriRepository $dataDiriRepository)
    {
        $this->dataDiriRepository = $dataDiriRepository;
        $this->user = $user;
        $this->userRepository = $userRepository;

        $this->middleware('auth', ['except' => ['login','register','refresh','logout']]);
    }

    public function register(AuthRequest $request){
        $user = $this->userRepository->userRegister($request);
        $token = Auth::guard('api')->login($user);
        $userRegister = new UserCollection([
            'user' => $user,
            'token'=>$token
        ]);
        return $userRegister->response()->setStatusCode(Response::HTTP_OK);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::guard('api')->user();
        $userRegister = new UserCollection([
            'user' => $user,
            'token'=>$token
        ]);
        return $userRegister->response()->setStatusCode(Response::HTTP_OK);
    }

    public function logout(Request $request)
    {
        Auth::guard('api')->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh(Request $request)
    {
        return $userRegister = new UserCollection([
            'user' => Auth::guard('api')->user(),
            'token'=> Auth::guard('api')->refresh()
        ]);
        return $userRegister->response()->setStatusCode(Response::HTTP_OK);
    }
}
