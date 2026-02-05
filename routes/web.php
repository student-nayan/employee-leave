<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminProfileController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\User\ApplyController;
use App\Http\Controllers\user\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\User\PasswordController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\admin\AdminPasswordController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\LeaveController;
use App\Http\Controllers\admin\LeaveTypeController;

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'isAdmin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');
});

Route::middleware(['auth', 'isUser'])
    ->prefix('user')
    ->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])
            ->name('user.dashboard');
});

Route::get('/forgot-password', [AuthController::class, 'showForgot'])
    ->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
    ->name('forgot.password.submit');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])
    ->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])
    ->name('password.update');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::middleware(['auth', 'isUser'])->prefix('user')->group(function () {

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
    Route::get('/apply-leave', [UserController::class, 'applyLeave'])->name('user.apply-leave');
    Route::get('/leave-history', [UserController::class, 'leaveHistory'])->name('user.leave-history');
    Route::get('/user/apply-leave', [ApplyController::class, 'create'])->name('leave.create');
    Route::post('/user/apply-leave', [ApplyController::class, 'store'])->name('leave.store');
    Route::get('/change-password', [PasswordController::class, 'show'])->name('user.change-password');
    Route::post('/change-password', [PasswordController::class, 'update'])->name('user.change-password.update');
    
    

});

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class,'dashboard'])
        ->name('admin.dashboard');
    

    // Department
    Route::get('/department/create',[DepartmentController::class,'create'])
        ->name('admin.department.create');
    Route::get('/department',[DepartmentController::class,'index'])
        ->name('admin.department.index');
    Route::post('/departments/store',[DepartmentController::class,'store'])
        ->name('department.store');
    Route::get('/admin/departments', [DepartmentController::class, 'departments'])
        ->name('department.departments');
    Route::get('/department/{id}/edit', [DepartmentController::class, 'edit'])
        ->name('department.edit');

    Route::put('/department/{id}', [DepartmentController::class, 'update'])
        ->name('department.update');

    Route::delete('/department/{id}', [DepartmentController::class, 'destroy'])
        ->name('department.destroy');

    // Leave Type

    

    Route::get('/leave-type', [LeaveTypeController::class, 'index'])
        ->name('admin.leave-type.index');

    Route::get('/leave-type/create', [LeaveTypeController::class, 'create'])
        ->name('admin.leave-type.create');

    Route::post('/leave-type', [LeaveTypeController::class, 'store'])
        ->name('admin.leave-type.store');

    Route::get('/leave-type/{id}/edit', [LeaveTypeController::class, 'edit'])
        ->name('admin.leave-type.edit');

    Route::put('/leave-type/{id}', [LeaveTypeController::class, 'update'])
        ->name('admin.leave-type.update');

    Route::delete('/leave-type/{id}', [LeaveTypeController::class, 'destroy'])
        ->name('admin.leave-type.destroy');
    
    //Employee
    Route::get('/employee', [EmployeeController::class, 'index'])
        ->name('admin.employee.index');

    Route::get('/employee/create', [EmployeeController::class, 'create'])
        ->name('admin.employee.create');

    Route::post('/employee', [EmployeeController::class, 'store'])
        ->name('admin.employee.store');

    Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])
        ->name('admin.employee.edit');

    Route::put('/employee/{id}', [EmployeeController::class, 'update'])
        ->name('admin.employee.update');

    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])
        ->name('admin.employee.destroy');
    
    //leaves Management
    Route::get('/leaves/all', [LeaveController::class, 'all'])->name('admin.leaves.all');

    Route::get('/leaves/pending', [LeaveController::class, 'pending'])->name('admin.leaves.pending');

    Route::get('/leaves/approved', [LeaveController::class, 'approved'])->name('admin.leaves.approved');

    Route::get('/leaves/rejected', [LeaveController::class, 'rejected'])->name('admin.leaves.rejected');

    Route::get('/leaves/{id}', [LeaveController::class, 'show'])->name('admin.leaves.show');

    Route::post('/leaves/update-status/{id}', [LeaveController::class, 'updateStatus'])
        ->name('admin.leaves.updateStatus');
    
    Route::get('/user/profile', [UserProfileController::class, 'index'])
        ->name('user.profile');

    Route::post('/user/profile', [UserProfileController::class, 'update'])
        ->name('user.profile.update');

    Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
    })->name('logout');

    Route::get('/profile', [AdminProfileController::class,'profile'])
        ->name('admin.profile');
        
    Route::get('/profile', [AdminProfileController::class, 'show'])
        ->name('admin.profile.show');

    Route::get('/profile/edit', [AdminProfileController::class, 'edit'])
        ->name('admin.profile.edit');

    Route::post('/profile/update', [AdminProfileController::class, 'update'])
        ->name('admin.profile.update');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/user/profile', [UserProfileController::class, 'index'])
        ->name('user.profile');

    Route::post('/user/profile', [UserProfileController::class, 'update'])
        ->name('user.profile.update');

});


    

    


    
