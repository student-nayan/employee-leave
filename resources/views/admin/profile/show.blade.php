@extends('admin.layouts.app')
@section('title','My Profile')

@section('content')
<div class="card p-4">
    <h3>Admin Profile</h3>

    

    <p><strong>Name:</strong> {{ $admin->name }}</p>
    <p><strong>Email:</strong> {{ $admin->email }}</p>
    <p><strong>Mobile:</strong> {{ $admin->phone }}</p>
    <p><strong>DOB:</strong> {{ $admin->dob }}</p>
    <p><strong>Address:</strong> {{ $admin->address }}</p>

    <p><strong>Image:</strong></p>
    <img src="{{ asset('assets/admin_images/'.$admin->image) }}" width="150">
    <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary mb-3">Update Profile</a>
</div>
@endsection
