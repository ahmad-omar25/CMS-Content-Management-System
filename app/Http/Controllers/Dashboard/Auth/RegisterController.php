<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\Register;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showAdminRegister()
    {
        return view('dashboard.auth.register');
    }

    protected function createAdmin(Register $request)
    {
        try {
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            toast('Account created successfully go sign in','success');
            return redirect()->route('admin.login');
        } catch (\Exception $exception) {
            toast((__('dashboard.error_message')),'error');
            return redirect()->route('admin.register');
        }
    }
}
