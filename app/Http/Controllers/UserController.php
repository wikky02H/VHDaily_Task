<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

class UserController extends Controller
{

    public function loginUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "email" => "required|email|min:10",
            "password" => "required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "message" => "validation error",
                "result" => $validation->errors()
            ], 400);
        }
        try {
            $user = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            // $user=[];
            // $user["email"] = $request->email;
            // $user["password"] = $request->password;

            if ($user) {
                Log::info("user", [$user]);
                return response()->json([
                    'message' => 'User Login successfully',
                    'result' => $user,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User insert error',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }

    public function getUser($email)
    {
       ;
        $user = [
            'email' => 'VNkumar123@gmail.com',
            'password' => 'hashedpassword',
        ];
             Log::info('error', [$user]);
        try {
            if ($email === $user['email']) {
                return response()->json([
                    'message' => 'Get user successfully',
                    'Result' => $user,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User not found',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }

    public function updateUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "email" => "required|email|min:10",
            "password" => "required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "message" => "validation error",
                "Result" => $validation->errors()
            ], 400);
        }

        try {
            $user = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            log::info("user", [$user]);
            if ($user) {
                return response()->json([
                    'message' => 'Get user successfully',
                    'result' => $user,
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User not found',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }

    public function deleteUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "email" => "required|email|min:10",
        ]);

        if ($validation->fails()) {
            return response()->json([
                "message" => "validation error",
                "Result" => $validation->errors()
            ], 400);
        }

        try {
            $user = [
                'email' => $request->email,
                'password' => 'password',
            ];
            if ($user) {
                return response()->json([
                    'message' => 'User deleted successfully',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'User not found',
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('error', [$e]);
            return response()->json([
                "message" => "Internal server error",
            ], 500);
        }
    }
}
