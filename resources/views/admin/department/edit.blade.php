@extends('admin.layouts.app')
@section('title','Edit Department')

@section('content')
<div class="card p-4 col-md-6">
    <h4>Edit Department</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('department.update', $department->id) }}">
        @csrf
        @method('PUT')

        <input type="text"
               name="Department_Name"
               class="form-control mb-3"
               value="{{ $department->Department_Name }}"
               placeholder="Department Name">

        <input type="text"
               name="Department_Short_Name"
               class="form-control mb-3"
               value="{{ $department->Department_Short_Name }}"
               placeholder="Department Short Name">

        <input type="text"
               name="Department_Code"
               class="form-control mb-3"
               value="{{ $department->Department_Code }}"
               placeholder="Department Code">

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.department.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>
</div>
@endsection
