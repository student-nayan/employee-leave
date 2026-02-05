<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminProfile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    
    public function show()
    {
        $admin = AdminProfile::where('email', Auth::user()->email)->first();
        return view('admin.profile.show', compact('admin'));
    }

    
    public function edit()
    {
        $admin = AdminProfile::where('email', Auth::user()->email)->first();
        return view('admin.profile.edit', compact('admin'));
    }

    
    public function update(Request $request)
    {
        $admin = AdminProfile::where('email', Auth::user()->email)->first();
        $user  = Auth::user(); 

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
            'password' => 'nullable|min:6',
        ]);

        // IMAGE UPLOAD
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('assets/admin_images'), $imageName);
            $admin->image = $imageName;
        }

        // UPDATE PROFILE DATA
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'address' => $request->address,
        ]);

        // UPDATE LOGIN EMAIL
        $user->email = $request->email;

        // UPDATE PASSWORD (ONLY IF ENTERED)
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile.show')->with('success', 'Profile updated successfully');
    }
}
