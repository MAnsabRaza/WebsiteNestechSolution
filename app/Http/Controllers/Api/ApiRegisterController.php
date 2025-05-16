<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiRegisterController extends Controller
{
    public function saveRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_name' => 'required|string',
            'country' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            $data = $request->all();

            $user = new User();
            $user->user_name = $data['user_name'];
            $user->country = $data['country'];
            $user->city = $data['city'];
            $user->contact_number = $data['contact_number'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->remember_token = null;
            $user->save();

            $lastInsertUserId = $user->id;

            $user_role = new user_role();
            $user_role->role_name = $data['role_name'];
            $user_role->user_id = $lastInsertUserId;
            $user_role->save();

            return response()->json(['success' => true, 'message' => 'User saved successfully!']);
        } catch (\Exception $e) {


            return response()->json([
                'success' => false,
                'message' => 'An error occurred during registration: ' . $e->getMessage()
            ], 500);
        }
    }
}