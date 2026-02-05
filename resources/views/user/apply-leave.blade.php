@extends('user.layouts.app')
@section('title','Apply Leave')

@section('content')
<div class="card p-4 col-md-8">
    <h3>Apply for Leave</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('leave.store') }}" method="POST">
        @csrf

       <select class="form-control mb-3" name="leave_type" required>
    <option value="">Select leave type</option>

    @forelse ($leaveTypes as $type)
    <option value="{{ $type->Leave_Type }}">
        {{ $type->Leave_Type }}
    </option>
@empty
    <option disabled>No leave type available</option>
@endforelse

</select>



        <div class="row mb-3">
            <div class="col-md-6">
                <label>From Date</label>
                <input type="date" class="form-control" name="from_date">
            </div>
            <div class="col-md-6">
                <label>To Date</label>
                <input type="date" class="form-control" name="to_date">
            </div>
        </div>

        <textarea class="form-control mb-3" name="description" placeholder="Description"></textarea>

        <button class="btn btn-primary">Apply</button>
    </form>
</div>
@endsection
