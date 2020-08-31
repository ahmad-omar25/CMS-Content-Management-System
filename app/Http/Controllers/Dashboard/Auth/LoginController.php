<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\Login;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showAdminLogin()
    {
        return view('dashboard.auth.login');
    }

    public function adminLogin(Login $request)
    {
        try {
            if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                toast('Sign In Successfully','success');
                return redirect()->route('admin.dashboard');
            }
            toast((__('dashboard.error_data')),'error');
            return redirect()->route('admin.login')->withInput($request->only('email'));
        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')),'error');
            return redirect()->route('admin.login');
        }
    }

    public function logout() {
        auth()->guard('admin')->logout();
        toast('Logout Successfully','success');
        return redirect()->route('admin.login');
    }
}
