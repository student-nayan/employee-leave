<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class UserProfileController extends Controller
{
    // Show profile page
    public function index()
    {
        $employee = Employee::where('user_id', Auth::id())->first();

        if (!$employee) {
            return redirect()->route('user.dashboard')
                ->with('error', 'Employee profile not found.');
        }

        return view('user.profile', compact('employee'));
    }

    // Update profile
    public function update(Request $request)
    {
        $employee = Employee::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname'  => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:employees,email,' . $employee->id,
            'mno'       => 'nullable|string|max:15',
            'gender'    => 'nullable|in:Male,Female,Other',
            'birthdate' => 'nullable|date',
            'address'   => 'nullable|string|max:500',
            'country'   => 'nullable|string|max:100',
            'city'      => 'nullable|string|max:100',
        ]);

        $employee->update([
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'email'     => $request->email,
            'mno'       => $request->mno,
            'gender'    => $request->gender,
            'birthdate' => $request->birthdate,
            'address'   => $request->address,
            'country'   => $request->country,
            'city'      => $request->city,
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }
}
