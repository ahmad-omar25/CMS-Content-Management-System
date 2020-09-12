<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\UserProfile\Update;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('website.users.index', compact('user'));
    }

    public function update(Update $request) {
        try {
            $user = User::find(auth()->user()->id);
            $data = $request->except('password', 'password_confirmation');
            if ($request->has('password') && !is_null($request->input('password'))) {
                $user['password'] = bcrypt($request->input('password'));
            }
            $user->update($data);
            toast('Updated Successfully','success');
            return redirect()->route('profile.index');
        } catch (\Exception $exception) {
            toast('Updated Filed','error');
            return redirect()->route('profile.index');
        }
    }
}
