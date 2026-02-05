@extends('admin.layouts.app')
@section('title','Edit Profile')

@section('content')
<div class="card p-4">
    <h3>Edit Profile</h3>

    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
        @csrf

        <input type="text" name="name" value="{{ $admin->name }}" class="form-control mb-2">
        <input type="email" name="email" value="{{ $admin->email }}" class="form-control mb-2">
        <input type="text" name="phone" value="{{ $admin->phone }}" class="form-control mb-2">
        <input type="date" name="dob" value="{{ $admin->dob }}" class="form-control mb-2">
        <textarea name="address" class="form-control mb-2">{{ $admin->address }}</textarea>

        <input type="password" name="password" class="form-control mb-2" placeholder="New Password (optional)">

        <input type="file" name="image" value="{{ $admin->image }}" class="form-control mb-2">

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
