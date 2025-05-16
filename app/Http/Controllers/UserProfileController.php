<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserProfileController extends Controller
{
    public function index()
    {
        $data['modules'] = ['Setup/addUserProfile.js'];
        return view('UserProfile/userProfile', $data);
    }
    // public function saveUserProfile(Request $request)
    // {
    //     try {
    //         $data = $request->all();
    //         Log::info('Profile update request data:', $data);
    //         if (isset($data['id']) && !empty($data['id'])) {
    //             $user = User::find($data['id']);
    //             if (!$user) {
    //                 return response()->json(['success' => false, 'message' => 'User not found!'], 404);
    //             }
    //             $user->user_name = $data['user_name'];
    //             $user->city = $data['city'] ?? $user->city;
    //             $user->country = $data['country'] ?? $user->country;
    //             $user->contact_number = $data['contact_number'] ?? $user->contact_number;
    //             $user->email = $data['email'] ?? $user->email;
    //             if (!empty($data['password'])) {
    //                 $user->password = $data['password'];
    //             }
    //             $user->save();
    //             if (isset($data['role_name'])) {
    //                 $user_role = user_role::where('user_id', $data['id'])->first();
    //                 if ($user_role) {
    //                     $user_role->role_name = $data['role_name'];
    //                     $user_role->save();
    //                 } else {
    //                     $user_role = new user_role();
    //                     $user_role->role_name = $data['role_name'];
    //                     $user_role->user_id = $user->id;
    //                     $user_role->save();
    //                 }
    //             }
    //             return response()->json(['success' => true, 'message' => 'User updated successfully!']);
    //         } else {
    //             $user = new User();
    //             $user->user_name = $data['user_name'];
    //             $user->city = $data['city'] ?? null;
    //             $user->country = $data['country'] ?? null;
    //             $user->contact_number = $data['contact_number'] ?? null;
    //             $user->email = $data['email'];
    //             $user->password = $data['password'] ?? null;
    //             $user->save();

    //             if (isset($data['role_name'])) {
    //                 $user_role = new user_role();
    //                 $user_role->role_name = $data['role_name'];
    //                 $user_role->user_id = $user->id;
    //                 $user_role->save();
    //             }
    //             return response()->json(['success' => true, 'message' => 'User saved successfully!']);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Error in saveUserProfile: ' . $e->getMessage(), [
    //             'file' => $e->getFile(),
    //             'line' => $e->getLine(),
    //             'trace' => $e->getTraceAsString()
    //         ]);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Server error: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }
}
