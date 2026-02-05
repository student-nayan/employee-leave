@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">EMPLOYEE REGISTRATION</h2>

    <div class="card mx-auto" style="max-width:500px;">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Email Id</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div>
                    <label>Role</label>
                    <br>
                     <select name="role_id" required>
                     <option value="">-- Select Role --</option>
                     {{-- <option value="1" {{ old('role_id') == 1 ? 'selected' : '' }}>User</option> --}}
                     <option value="2" {{ old('role_id') == 2 ? 'selected' : '' }}>Admin</option>
                     </select>
                </div>


                <button class="btn btn-success float-end">REGISTER</button>
            </form>
        </div>
    </div>
</div>
@endsection
