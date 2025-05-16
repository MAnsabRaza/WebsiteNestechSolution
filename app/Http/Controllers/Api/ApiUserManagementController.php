<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\inward;
use App\Models\User;
use App\Models\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ApiUserManagementController extends Controller
{
    public function fetchUserSearchData()
    {
        $user = inward::fetchUserSearchData();
        return DataTables::of($user)->make(true);
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found!']);
        }
    }
    public function fetchUser($id)
    {
        $user = DB::table('users')
            ->join('user_role', 'users.id', '=', 'user_role.user_id')
            ->where('users.id', $id)
            ->select('users.*', 'user_role.*')
            ->first();
        if ($user) {
            return response()->json(['success' => true, 'data' => $user]);
        }
        return response()->json(['success' => false, 'message' => 'User not found!']);
    }
    public function saveUser(Request $request)
    {
        $data = $request->all();

        // Check if we're updating an existing user
        if (isset($data['id'])) {
            $user = User::find($data['id']);
            if ($user) {
                $user->user_name = $data['user_name'];
                $user->city = $data['city'];
                $user->contact_number = $data['contact_number'];
                $user->email = $data['email'];
                if (!empty($data['password'])) {
                    $user->password = $data['password'];
                }
                $user->save();

                // Update user role
                $user_role = user_role::where('user_id', $data['id'])->first();
                if ($user_role) {
                    $user_role->role_name = $data['role_name'];
                    $user_role->save();
                }

                return response()->json(['success' => true, 'message' => 'User updated successfully!']);
            }
            return response()->json(['success' => false, 'message' => 'User not found!']);
        }
        $user = new User();
        $user->user_name = $data['user_name'];
        $user->city = $data['city'];
        $user->contact_number = $data['contact_number'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->save();
        $user_role = new user_role();
        $user_role->role_name = $data['role_name'];
        $user_role->user_id = $user->id;
        $user_role->save();

        return response()->json(['success' => true, 'message' => 'User saved successfully!']);
    }
}
