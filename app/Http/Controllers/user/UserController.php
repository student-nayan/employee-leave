<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Leave_Type;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;



class UserController extends Controller
{
    public function dashboard()
    {
       $userId = Auth::id();
       $totalLeaves = Leave::where('user_id', $userId)->count();
       $approvedLeaves = Leave::where('user_id', $userId)
                            ->where('status', 'Approved')
                            ->count();
       $rejectedLeaves = Leave::where('user_id', $userId)
                            ->where('status', 'Rejected')
                            ->count();

       $pendingLeaves = Leave::where('user_id', $userId)
                            ->where('status', 'Pending')
                            ->count();
        return view('user.dashboard', compact(
        'totalLeaves',
        'approvedLeaves',
        'rejectedLeaves',
        'pendingLeaves'
    ));
    }

    public function profile()
    {
    $user = Auth::user();

    // Get employee linked to user
    $employee = Employee::where('id', $user->id)->first();

    return view('user.profile', compact('employee'));
    }

    public function changePassword()
    {
        return view('user.change-password');
    }

//     public function applyLeave()
// {
//     $leaveTypes = Leave_Type::all(); // must fetch from DB

//     return view('user.apply-leave', compact('leaveTypes'));
// }

    public function leaveHistory()
    {
    $leaves = Leave::where('user_id', Auth::id())
                    ->latest()
                    ->get();

    return view('user.leave-history', compact('leaves'));
    }
}

