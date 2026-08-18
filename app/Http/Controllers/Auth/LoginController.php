<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // Allow guests to access the login page
        $this->middleware('guest')->except('logout');
    }

    /*
    |--------------------------------------------------------------------------
    | Show Login Form
    |--------------------------------------------------------------------------
    */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    |
    | One login form:
    |
    | Admin  -> /admin
    | Writer -> /writer
    | User   -> /home
    |
    */

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        /*
        |--------------------------------------------------------------------------
        | Admin Login
        |--------------------------------------------------------------------------
        */

        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        /*
        |--------------------------------------------------------------------------
        | Writer Login
        |--------------------------------------------------------------------------
        */

        if (Auth::guard('writer')->attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            return redirect()->intended('/writer');
        }

        /*
        |--------------------------------------------------------------------------
        | Normal User Login
        |--------------------------------------------------------------------------
        */

        if (Auth::guard('web')->attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        /*
        |--------------------------------------------------------------------------
        | Login Failed
        |--------------------------------------------------------------------------
        */

        return back()
            ->withErrors([
                'email' => 'The provided email or password is incorrect.',
            ])
            ->withInput($request->only('email', 'remember'));
    }

    /*
    |--------------------------------------------------------------------------
    | Admin Login Form
    |--------------------------------------------------------------------------
    */

    public function showAdminLoginForm()
    {
        return view('auth.login', [
            'url' => 'admin'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Admin Login
    |--------------------------------------------------------------------------
    */

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt(
            $credentials,
            $request->boolean('remember')
        )) {

            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid admin email or password.',
            ])
            ->withInput($request->only('email', 'remember'));
    }

    /*
    |--------------------------------------------------------------------------
    | Writer Login Form
    |--------------------------------------------------------------------------
    */

    public function showWriterLoginForm()
    {
        return view('auth.login', [
            'url' => 'writer'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Writer Login
    |--------------------------------------------------------------------------
    */

    public function writerLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('writer')->attempt(
            $credentials,
            $request->boolean('remember')
        )) {

            $request->session()->regenerate();

            return redirect()->intended('/writer');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid writer email or password.',
            ])
            ->withInput($request->only('email', 'remember'));
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        // Logout from all guards
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();
        Auth::guard('writer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}