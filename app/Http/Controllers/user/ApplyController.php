<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use App\Models\Leave_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    public function create()
    {
    $leaveTypes = Leave_Type::all();

    return view('user.apply-leave', compact('leaveTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'leave_type' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'description' => 'nullable',
        ]);

        Leave::create([
            'user_id' => Auth::id(),
            'leave_type' => $request->leave_type,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'description' => $request->description,
            'status' => 'Pending',
        ]);

        return back()->with('success', 'Leave applied successfully');
    }

    public function history()
    {
        $leaves = Leave::where('user_id', Auth::id())
            ->all()->get();//2 = id

        return view('user.leave-history', compact('leaves'));

    }
}
