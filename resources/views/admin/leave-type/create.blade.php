@extends('admin.layouts.app')

@section('content')




<div class="card p-4 col-md-6">
    <h4>Add Leave Type </h4>

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

    <form method="POST" action="{{ route('admin.leave-type.store') }}">
        @csrf

        <input type="text" 
               name="Leave_Type" 
               class="form-control mb-3" 
               placeholder="Leave Type">

        <input type="text" 
               name="Leave_Description" 
               class="form-control mb-3" 
               placeholder="Leave Description">

       

        <button class="btn btn-primary">ADD</button>
    </form>
</div>



@endsection