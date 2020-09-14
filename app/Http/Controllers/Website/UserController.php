<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\UserProfile\Update;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('website.users.index', compact('user'));
    }

    public function update(Request $request)
    {
        try {
            $user = User::find(auth()->user()->id);
            $data = $request->except('_token', 'password', 'password_confirmation', 'user_image');

            if ($request->has('password') && !is_null($request->input('password'))) {
                $data['password'] = bcrypt($request->input('password'));
            }
            if ($image = $request->file('user_image')) {

                $filename = Str::slug($user->name) . '.' . $image->getClientOriginalExtension();
                $path = public_path('assets/users/' . $filename);
                Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['user_image'] = $filename;
            }

            $user->update($data);
            toast('Updated Successfully', 'success');
            return redirect()->route('profile.index');
        } catch (\Exception $exception) {
            toast('Updated Filed', 'error');
            return redirect()->route('profile.index');
        }
    }

}


