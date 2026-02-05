<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function all()
    {
    $leaves = Leave::with('user.employee')->latest()->get();
    return view('admin.leave.all', compact('leaves'));
    }

    public function pending()
    {
    $leaves = Leave::with('user.employee')
        ->where('status', 'Pending')
        ->latest()
        ->get();

    return view('admin.leave.pending', compact('leaves'));
    }

    public function approved()
    {
    $leaves = Leave::with('user.employee')
        ->where('status', 'Approved')
        ->latest()
        ->get();

    return view('admin.leave.approved', compact('leaves'));
    }

    public function rejected()
    {
    $leaves = Leave::with('user.employee')
        ->where('status', 'Rejected')
        ->latest()
        ->get();

    return view('admin.leave.rejected', compact('leaves'));
    }

    public function show($id)
    {
    $leave = Leave::with('user.employee')->findOrFail($id);

    $pastLeaves = Leave::where('user_id', $leave->user_id)
        ->where('id', '!=', $id)
        ->latest()
        ->get();

    return view('admin.leave.show', compact('leave', 'pastLeaves'));
    }


    public function updateStatus(Request $request, $id)
    {
    $leave = Leave::findOrFail($id);

    
    if ($leave->status !== 'Pending') {
        return redirect()->back()
            ->with('error', 'This leave has already been finalized.');
    }

    $leave->status = $request->status;
    $leave->save();

    return redirect()->route('admin.leaves.all')
        ->with('success', 'Leave status updated');
    }

}