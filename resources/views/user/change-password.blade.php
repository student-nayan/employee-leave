@extends('user.layouts.app')
@section('title','Change Password')

@section('content')
<div class="card p-4 col-md-6">
    <h4>Change Password</h4>

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

    <form method="POST" action="{{ route('user.change-password.update') }}">
        @csrf

        <input type="password" 
               name="current_password" 
               class="form-control mb-3" 
               placeholder="Current Password">

        <input type="password" 
               name="password" 
               class="form-control mb-3" 
               placeholder="New Password">

        <input type="password" 
               name="password_confirmation" 
               class="form-control mb-3" 
               placeholder="Confirm Password">

        <button class="btn btn-primary">Change</button>
    </form>
</div>
@endsection
