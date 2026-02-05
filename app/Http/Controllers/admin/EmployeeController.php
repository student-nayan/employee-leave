<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function create()
    {
        $departments=Department::all();
        return view('admin.employee.create',compact('departments'));
    }


   

    public function index()
    {
         $employees = Employee::orderBy('created_at', 'desc')->get();
         return view('admin.employee.index', compact('employees'));
    }
    public function store(Request $request)
    {
    $request->validate([
        
        'firstname' => 'required',
        'lastname' => 'required',
        'department' => 'required',
        
        'mno' => 'required',
        'gender' => 'required',
        'birthdate' => 'required|date',
        'address' => 'required',
        'country' => 'required',
        'city' => 'required',
    ]);
    $email = strtolower(
        $request->firstname . '.' . $request->lastname . '@info.com'
    );
    $random = rand(100, 999);

   $plainPassword = strtolower($request->firstname) . $random;
    $user = User::create([
    'name'     => $request->firstname . ' ' . $request->lastname,
    'email'    => $email,
    'password' => Hash::make($plainPassword),
    'role_id'  => 1, 
    ]);


    Employee::create([
        'user_id' => $user->id,
        'emp_number'  => $random,
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'department' => $request->department,
        'email' => $email, // same email
        'password'=>$plainPassword,
        'mno' => $request->mno,
        'gender' => $request->gender,
        'birthdate' => $request->birthdate,
        'address' => $request->address,
        'country' => $request->country,
        'city' => $request->city,

    ]);

    return redirect()->back()->with(
        'success',
        "Employee added successfully. Login Email: $email | Password: $plainPassword"
    );
    }

  public function employees()
  {
    $employees = Employee::orderBy('created_at', 'desc')->get();

    return view('admin.employee.index', compact('employees'));
  }
  public function edit($id)
  {
    $employee = Employee::findOrFail($id);
    $departments = Department::all();
    return view('admin.employee.edit', compact('employee', 'departments'));
  }

  public function update(Request $request, $id)
  {
    $request->validate([
        'emp_number' => 'required',
        'firstname'  => 'required',
        'lastname'   => 'required',
        'department' => 'required',
        'email'      => 'required|email',
        'mno'        => 'required',
        'address'    => 'required',
    ]);

    $employee = Employee::findOrFail($id);

    $employee->update([
        'emp_number' => $request->emp_number,   // ✅ FIXED
        'firstname'  => $request->firstname,
        'lastname'   => $request->lastname,
        'department' => $request->department,   // ✅ SAVED
        'email'      => $request->email,
        'mno'        => $request->mno,           // ✅ ADDED
        'address'    => $request->address,       // ✅ ADDED
    ]);

    return redirect()
    ->route('admin.employee.index')
    ->with('success', 'Employee updated successfully');
    }



    public function destroy($id)
    {
    Employee::findOrFail($id)->delete();

    return redirect()
        ->route('admin.employee.index')
        ->with('success', 'Employee deleted successfully');
    }


}


