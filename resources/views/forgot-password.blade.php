@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">WELCOME TO EMPLOYEE LEAVE MANAGEMENT SYSTEM</h2>

    <div class="card mx-auto" style="max-width:500px;">
        <div class="card-body">
            <h4 class="mb-3">FORGOT PASSWORD</h4>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('forgot.password.submit') }}">
                @csrf

                <div class="mb-3">
                    <label>Email Id</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <!-- Same button style as login/register -->
                <button class="btn btn-success w-100">
                    SEND RESET LINK
                </button>
            </form>

            <div class="text-end mt-3">
                <a href="{{ url('/login') }}" class="text-decoration-none">
                    Back to Login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
