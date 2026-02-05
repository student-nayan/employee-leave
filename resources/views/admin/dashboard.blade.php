@extends('admin.layouts.app')

@section('content')

<div class="dashboard-cards">

    <div class="card-box">
        <p>Total Regd Employees</p>
        <h2>{{ $totalEmployees }}</h2>
    </div>

    <div class="card-box">
        <p>Listed Departments</p>
        <h2>{{ $totalDepartments }}</h2>
    </div>

    <div class="card-box">
        <p>Listed Leave Types</p>
        <h2>{{ $totalLeaveTypes }}</h2>
    </div>

    <div class="card-box">
        <p>Approved Leaves</p>
        <h2 class="text-success">{{ $approvedLeaves }}</h2>
    </div>

    <div class="card-box">
        <p>Total Leaves</p>
        <h2>{{ $totalLeaves }}</h2>
    </div>

    <div class="card-box">
        <p>Pending Leaves</p>
        <h2 class="text-warning">{{ $pendingLeaves }}</h2>
    </div>

</div>

@endsection
