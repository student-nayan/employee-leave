@extends('admin.layouts.app')
@section('title','User Profile')

@section('content')
<div class="card p-4">
    <h3 class="mb-4">Employee Info</h3>

    <form method="POST" action="{{ route('admin.employee.store') }}">

    @csrf

   

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>First Name</label>
            <input type="text" class="form-control" name="firstname">
        </div>

        <div class="col-md-6 mb-3">
            <label>Last Name</label>
            <input type="text" class="form-control" name="lastname">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Department</label>
            <select class="form-control" name="department">
                <option value="">Select Department</option>
                @forelse ($departments as $dept)
                
                <option value="{{ $dept->Department_Name }}"> {{$dept->Department_Name}}</option>

                @empty
    <option disabled>No Department available</option>
    @endforelse
            </select>
        </div>
    </div>

    <div class="row">
        

        <div class="col-md-6 mb-3">
            <label>Mobile Number</label>
            <input type="text" class="form-control" name="mno">
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Gender</label>
            <select class="form-control" name="gender">
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label>Date of Birth</label>
            <input type="date" class="form-control" name="birthdate">
        </div>
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea class="form-control" name="address"></textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Country</label>
            <input type="text" class="form-control" name="country">
        </div>

        <div class="col-md-6 mb-3">
            <label>City</label>
            <input type="text" class="form-control" name="city">
        </div>
    </div>

    <button class="btn btn-primary mt-3">ADD</button>
</form>

</div>
@endsection
