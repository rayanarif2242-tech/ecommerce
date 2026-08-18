<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Show Profile
    public function index()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.profile', compact('admin'));
    }

    // Show Edit Profile
    public function edit()
    {
        $admin = Auth::guard('admin')->user();

        return view('admin.profile_edit', compact('admin'));
    }

    // Update Profile
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $admin = Auth::guard('admin')->user();

        $admin->name = $request->name;
        $admin->email = $request->email;

        if ($request->hasFile('image')) {

            if ($admin->image && file_exists(public_path('uploads/admin/' . $admin->image))) {
                unlink(public_path('uploads/admin/' . $admin->image));
            }

            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/admin'), $image);

            $admin->image = $image;
        }

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return redirect()->route('admin.profile')
            ->with('success', 'Profile updated successfully.');
    }
}