@extends('admin.layouts.app')

@section('content')
<div class="card p-4 col-md-6">
    <h4>Edit Leave Type</h4>

    <form method="POST" action="{{ route('admin.leave-type.update', $leave_type->id) }}">
        @csrf
        @method('PUT')

        <input type="text"
               name="Leave_Type"
               class="form-control mb-3"
               value="{{ $leave_type->Leave_Type }}">

        <input type="text"
               name="Leave_Description"
               class="form-control mb-3"
               value="{{ $leave_type->Leave_Description }}">

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
