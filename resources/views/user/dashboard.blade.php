@extends('user.layouts.app')

@section('title','Dashboard')

@section('content')

<div class="row g-4">

    <div class="col-md-3">
        <div class="card p-3 text-center shadow-sm">
            <h6>Total Leaves</h6>
            <h3>{{ $totalLeaves }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center shadow-sm border-success">
            <h6>Approved Leaves</h6>
            <h3 class="text-success">{{ $approvedLeaves }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center shadow-sm border-warning">
            <h6>Pending Leaves</h6>
            <h3 class="text-warning">{{ $pendingLeaves }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center shadow-sm border-danger">
            <h6>Rejected Leaves</h6>
            <h3 class="text-danger">{{ $rejectedLeaves }}</h3>
        </div>
    </div>

</div>

@endsection
