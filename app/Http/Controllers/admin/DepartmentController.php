<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function create()
    {
        return view('admin.department.create');
    }

    public function index()
    {
         $departments = Department::orderBy('created_at', 'desc')->get();
         return view('admin.department.index', compact('departments'));
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'Department_Name' => 'required',
            'Department_Short_Name'  => 'required',
            'Department_Code'    => 'required',
            
        ]);

        Department::create([
            'id'    => Auth::id(),
            'Department_Name' => $request->Department_Name,
            'Department_Short_Name'  => $request->Department_Short_Name,
            'Department_Code'    => $request->Department_Code,
            
        ]);

        return back()->with('success', 'Department Added successfully');
    }

    public function departments()
    {
    $departments = Department::orderBy('created_at', 'desc')->get();

    return view('admin.department.index', compact('departments'));
    }
   

    public function edit($id)
    {
    $department = Department::findOrFail($id);
    return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'Department_Name' => 'required',
        'Department_Short_Name' => 'required',
        'Department_Code' => 'required',
    ]);

    $department = Department::findOrFail($id);

    $department->update([
        'Department_Name' => $request->Department_Name,
        'Department_Short_Name' => $request->Department_Short_Name,
        'Department_Code' => $request->Department_Code,
    ]);

    return redirect()
        ->route('admin.department.index')
        ->with('success', 'Department updated successfully');
    }
    public function destroy($id)
    {
    $department = Department::findOrFail($id);
    $department->delete();

    return redirect()
        ->route('admin.department.index')
        ->with('success', 'Department deleted successfully');
    }
}

