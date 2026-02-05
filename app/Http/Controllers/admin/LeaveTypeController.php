<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Leave_Type;


class LeaveTypeController extends Controller
{
    public function index()
    {
        $leave_types = Leave_Type::latest()->get();
        return view('admin.leave-type.index', compact('leave_types'));
    }

    public function create()
    {
        return view('admin.leave-type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Leave_Type' => 'required',
            'Leave_Description' => 'required',
        ]);

        Leave_Type::create([
            'Leave_Type' => $request->Leave_Type,
            'Leave_Description' => $request->Leave_Description,
        ]);

        return redirect()
            ->route('admin.leave-type.create')
            ->with('success', 'Leave Type Added successfully');
    }

    public function edit($id)
    {
        $leave_type = Leave_Type::findOrFail($id);
        return view('admin.leave-type.edit', compact('leave_type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Leave_Type' => 'required',
            'Leave_Description' => 'required',
        ]);

        $leave_type = Leave_Type::findOrFail($id);
        $leave_type->update($request->only('Leave_Type', 'Leave_Description'));

        return redirect()
            ->route('admin.leave-type.index')
            ->with('success', 'Leave Type updated successfully');
    }

    public function destroy($id)
    {
        Leave_Type::findOrFail($id)->delete();

        return redirect()
            ->route('admin.leave-type.index')
            ->with('success', 'Leave Type deleted successfully');
    }
}


