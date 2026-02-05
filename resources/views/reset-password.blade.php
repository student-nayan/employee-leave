@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">WELCOME TO EMPLOYEE LEAVE MANAGEMENT SYSTEM</h2>

    <div class="card mx-auto" style="max-width:500px;">
        <div class="card-body">
            <h4 class="mb-3">RESET PASSWORD</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">

                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button class="btn btn-success w-100">
                    RESET PASSWORD
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
