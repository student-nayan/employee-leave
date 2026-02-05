@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">WELCOME TO EMPLOYEE LEAVE MANAGEMENT SYSTEM</h2>

    <div class="card mx-auto" style="max-width:500px;">
        <div class="card-body">
            <h4 class="mb-3">LOGIN</h4>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="mb-3">
                    <label>Email Id</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <!-- Login Button -->
                <button class="btn btn-success float-end">SIGN IN</button>

                <!-- Forgot Password (Bottom Right) -->
                <div class="clearfix"></div>
                <div class="text-end mt-2">
                    <a href="{{ url('/forgot-password') }}" class="text-decoration-none">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
