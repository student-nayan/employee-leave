<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Leave_Type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalEmployees = Employee::count();

        $totalDepartments = Employee::select('department')
            ->distinct()
            ->count();

        $totalLeaveTypes = Leave_Type::select('leave_type')
            ->distinct()
            ->count();

        $approvedLeaves = Leave::where('status', 'Approved')->count();

        $totalLeaves = Leave::count();

        $pendingLeaves = Leave::where('status', 'Pending')->count();

        
        return view('admin.dashboard', compact(
            'totalEmployees',
            'totalDepartments',
            'totalLeaveTypes',
            'approvedLeaves',
            'totalLeaves',
            'pendingLeaves'
        ));
    }
    
}
