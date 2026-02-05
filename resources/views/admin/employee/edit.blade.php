@extends('admin.layouts.app')
@section('title','User Profile')

@section('content')
<div class="card p-4">
    <h3 class="mb-4">Employee Info</h3>

    <form method="POST" action="{{ route('admin.employee.update', $employee->id) }}">
    @csrf
    <input type="hidden" name="id" value="{{ optional($employee)->id }}">
    @method('PUT')

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Employee Code</label>
            <input type="text" class="form-control" name="emp_number" value="{{ $employee->emp_number }}">
        </div>
    </div>

    <div class="row">
    <div class="col-md-6 mb-3">
        <label>First Name</label>
        <input type="text"
               class="form-control"
               name="firstname"
               value="{{ $employee->firstname }}">
    </div>

    <div class="col-md-6 mb-3">
        <label>Last Name</label>
        <input type="text"
               class="form-control"
               name="lastname"
               value="{{ $employee->lastname }}">
    </div>
</div>


    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Department</label>
            {{-- <select class="form-control" name="department">
    <option value="">Select Department</option>

    <option value="HR" {{ $employee->department == 'HR' ? 'selected' : '' }}>
        HR
    </option>

    <option value="IT" {{ $employee->department == 'IT' ? 'selected' : '' }}>
        IT
    </option>

    <option value="Finance" {{ $employee->department == 'Finance' ? 'selected' : '' }}>
        Finance
    </option>

    <option value="Marketing" {{ $employee->department == 'Marketing' ? 'selected' : '' }}>
        Marketing
    </option>

</select> --}}
<select class="form-control" name="department">
    <option value="">Select Department</option>

    @foreach ($departments as $dept)
        <option value="{{ $dept->Department_Name }}"
            {{ 
                strtolower(trim(old('department', $employee->department))) 
                == strtolower(trim($dept->Department_Name)) 
                ? 'selected' : '' 
            }}>
            {{ $dept->Department_Name }}
        </option>
    @endforeach
</select>
</div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ $employee->email }}">
        </div>
        <div class="col-md-6 mb-3">
            <label>Mobile Number</label>
            <input type="text" class="form-control" name="mno" value="{{ $employee->mno }}">
        </div>
        <div class="col-md-6 mb-3">
            <label>Address</label>
            <input type="address" class="form-control" name="address" value="{{ $employee->address }}">
        </div>

        
    </div>
<button class="btn btn-primary mt-3">Update</button>
</form>

</div>
@endsection
