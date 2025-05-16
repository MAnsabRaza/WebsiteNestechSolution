<?php

namespace App\Http\Controllers;

use App\Models\user_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\add_user;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended('/');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                $user = User::create([
                    'google_id' => $google_user->getId(),
                    'email' => $google_user->getEmail(),
                    'user_name' => $google_user->getName(),

                ]);
                user_role::create([
                    'user_id' => $user->id,
                    'role_name' => 'user',
                ]);
            }
            Auth::login($user);
            return redirect()->route('home');
        } catch (Exception $e) {
            dd($e);
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('UserLogout');
    }
    public function index()
    {
        return view('Login/login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user, true);

            // Fetch modules and components

            return response()->json([
                'success' => true,
                'message' => 'Login Successful',
                'redirect' => route('home')
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }
    }


    public function UserLogout(Request $request)
    {
        Auth::logout(); // Logs out the user
        $request->session()->invalidate(); // Invalidates the session
        $request->session()->regenerateToken(); // Regenerates the CSRF token

        return redirect()->route('home'); // Redirects to the login page
    }
}