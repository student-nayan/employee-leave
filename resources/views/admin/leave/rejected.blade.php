@extends('admin.layouts.app')
@section('title','All Leave')

@section('content')
<div class="card">
    <div class="card-header">Rejected Leave</div>

   
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Employee Name</th>
                    <th>Leave Type</th>
                    <th>Posting Date</th>
                    <th>Status</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
@forelse ($leaves as $leave)
<tr>
    <td>
    {{ $leave->user->employee->firstname ?? 'N/A' }}
    {{ $leave->user->employee->lastname ?? '' }}
    <strong>
        ({{ $leave->user->employee->emp_number ?? '' }})
    </strong>
</td>

    <td>{{ $leave->leave_type }}</td>

    <td>{{ $leave->created_at->format('d-m-Y') }}</td>

    <td>
        <span class="badge 
            {{ $leave->status == 'Approved' ? 'bg-success' : 
               ($leave->status == 'Rejected' ? 'bg-danger' : 'bg-warning') }}">
            {{ $leave->status }}
        </span>
    </td>

    <td>
    <a href="{{ route('admin.leaves.show', $leave->id) }}"
       class="btn btn-sm btn-primary">
        View
    </a>
</td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center">No leave records found</td>
</tr>
@endforelse
</tbody>

        </table>
    </div>
    
</div>
@endsection
