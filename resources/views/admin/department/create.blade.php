@extends('admin.layouts.app')

@section('content')




<div class="card p-4 col-md-6">
    <h4>Add Department</h4>

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

    <form method="POST" action="{{ route('department.store') }}">
        @csrf

        <input type="text" 
               name="Department_Name" 
               class="form-control mb-3" 
               placeholder="Department Name">

        <input type="text" 
               name="Department_Short_Name" 
               class="form-control mb-3" 
               placeholder="Department_Short_Name">

        <input type="text" 
               name="Department_Code" 
               class="form-control mb-3" 
               placeholder="Department_Code">

        <button class="btn btn-primary">ADD</button>
    </form>
</div>



@endsection