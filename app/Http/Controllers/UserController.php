<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller {
    function UserRegistration(Request $request) {
        try {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName'  => $request->input('lastName'),
                'email'     => $request->input('email'),
                'mobile'    => $request->input('mobile'),
                'password'  => $request->input('password'),
            ]);
            return response()->json([
                'status'  => 'success',
                'message' => 'User Registration Successfully',
            ], status: 200);
        } catch (Exception $th) {
            return response()->json([
                'status'  => 'faild',
                'message' => 'User Registration Faild',
            ], status: 501);
        }

    }
    function UserLogin(Request $request) {
        $res = User::where($request->input())->count();
        if ($res == 1) {
            $token = JWTToken::CreateToken($request->input('email'));
            return response()->json(['msg' => 'Success', 'data' => $token]);
        } else {
            return response()->json(['msg' => 'Failed', 'data' => 'unauthorized']);
        }

    }
}
