<?php

namespace App\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\API\UserResource;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * API login handler.
     * 
     * @param Request $request
     * @return JSON
     */
    public function login(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $credential = $request->only('email', 'password');
            
            if (Auth::attempt($credential)) {
                $user = auth()->user();

                return (new UserResource($user))->additional([
                    'token' => $user->createToken($user->email)->plainTextToken
                ]);
            }

            return response()->json(['message' => 'The provided credentials are incorrect.'], 401);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server Error! Failed to authenticate.'], 500);
        }
    }

    /**
     * API logout handler.
     * 
     * @param Request $request
     * @return JSON
     */
    public function logout(Request $request)
    {
        try {
            if ($request->user()->tokens()->delete()) {
                return response()->json(['message' => 'You are successfully logged out.'], 200);
            }

            return response()->json(['message' => 'Failed to logged out.'], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Server Error! Failed to logout.'], 500);
        }
    }
}