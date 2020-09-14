<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\UserProfile\Update;
use App\Models\User;
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

    public function update(Update $request)
    {
        try {
            $data['name'] = $request->input('name');
            $data['email'] = $request->input('email');
            $data['mobile'] = $request->input('mobile');
            if ($image = $request->file('user_image')) {
                if (auth()->user()->user_image != '') {
                    if (File::exists('assets/users/' . auth()->user()->user_image)) {
                        unlink('assets/users/' . auth()->user()->user_image);
                    }
                }
                $filename = Str::slug(auth()->user()->name) . '.' . $image->getClientOriginalExtension();
                $path = public_path('assets/users/' . $filename);
                Image::make($image->getRealPath())->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['user_image'] = $filename;
            }
            if ($request->has('password') && !is_null($request->input('password'))) {
                $data['password'] = bcrypt($request->input('password'));
            }

            $update = auth()->user()->update($data);

            toast('Updated Successfully', 'success');
            return redirect()->route('profile.index');
        } catch (\Exception $exception) {
            toast('Updated Filed', 'error');
            return redirect()->route('profile.index');
        }
    }

    // View User Password
    public function update_password_index()
    {
        $user = User::find(auth()->user()->id);
        return view('website.users.update_password', compact('user'));
    }

    // Update User Password
    public function update_password(Update $request)
    {
        $user = User::find(auth()->user()->id);
        if ($request->has('password') && !is_null($request->input('password'))) {
            $data['password'] = bcrypt($request->input('password'));
        }
        $user->update($data);
        toast('Updated Successfully', 'success');
        return redirect()->back('profile.index');
    }
}

