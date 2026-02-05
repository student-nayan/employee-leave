
@extends('user.layouts.app')
@section('title','My Profile')

@section('content')
<div class="card p-4">
    <h3 class="mb-4">Employee Profile</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <strong>Employee Code:</strong>
            <p>{{ $employee->emp_number }}</p>
        </div>
        <div class="col-md-6">
            <strong>Email:</strong>
            <p>{{ $employee->email }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <strong>First Name:</strong>
            <p>{{ $employee->firstname }}</p>
        </div>
        <div class="col-md-6">
            <strong>Last Name:</strong>
            <p>{{ $employee->lastname }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <strong>Mobile Number:</strong>
            <p>{{ $employee->mno ?? '-' }}</p>
        </div>
        <div class="col-md-6">
            <strong>Gender:</strong>
            <p>{{ $employee->gender ?? '-' }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <strong>Date of Birth:</strong>
            <p>{{ $employee->birthdate ?? '-' }}</p>
        </div>
        <div class="col-md-6">
            <strong>Country:</strong>
            <p>{{ $employee->country ?? '-' }}</p>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <strong>City:</strong>
            <p>{{ $employee->city ?? '-' }}</p>
        </div>
        <div class="col-md-6">
            <strong>Address:</strong>
            <p>{{ $employee->address ?? '-' }}</p>
        </div>
    </div>
</div>
@endsection

