<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function show($name)
    {
        $user = User::where('name', $name)->first();
        $currentUser = Auth::user();
        if ($currentUser->role == 'user' && $user->role == 'admin') {
            return redirect()->back()->with('success', 'You are not authorized to view this page');
        } else {
            return
                view('dashboard.users.user_profile', compact('user'));
        }
        // return view('dashboard.users.user_profile', compact('user'));

    }
    public function edit($name)
    {
        $user = User::where('name', $name)->first();
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::where('name', Auth::user()->name)->first();
        //delete old image
        if ($request->user_image && $user->image) {
            File::delete(public_path('files/profile/images/' . $user->image));
        }
        //delete old attach
        if ($request->user_attach && $user->attach) {
            foreach ($user->attach as $attach) {
                File::delete(public_path('files/profile/attach/' . $attach));
            }
        }
        //upload new image
        if ($request->hasFile('user_image')) {
            $imageName = time() . '.' . $request->user_image->extension();
            $request->user_image->move(public_path('files/profile/images'), $imageName);
            $user->image = $imageName;
        }
        //upload new attach
        $acttachment = [];
        if ($request->hasFile('user_attach')) {
            foreach ($request->user_attach as $file) {
                $filesName2 = rand(1, 1000) . '.' . $file->getClientOriginalName();
                $file->move(public_path('files/profile/attach'), $filesName2);
                $acttachment[] = $filesName2;
                $request->merge([
                    'attach' => $acttachment
                ]);
            }
        }
        //update user
        $user->update($request->all());
        return redirect()->route('users.show', $user->name)->with('success', 'User updated successfully');
    }
}