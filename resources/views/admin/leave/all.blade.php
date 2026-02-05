@extends('admin.layouts.app')
@section('title','All Leave')

@section('content')
<div class="card">
    <div class="card-header">All Leave</div>

   
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
            <script>
function updateStatusColor(select) {
    select.classList.remove(
        'status-pending',
        'status-approved',
        'status-rejected'
    );

    if (select.value === 'Approved') {
        select.classList.add('status-approved');
    } else if (select.value === 'Rejected') {
        select.classList.add('status-rejected');
    } else {
        select.classList.add('status-pending');
    }
}
</script>

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

    {{-- <td> --}}
        {{-- <span class="badge 
            {{ $leave->status == 'Approved' ? 'bg-success' : 
               ($leave->status == 'Rejected' ? 'bg-danger' : 'bg-warning') }}">
            {{ $leave->status }}
        </span> --}}
         {{-- <form method="POST" 
                  action="{{ route('admin.leaves.updateStatus',$leave->id) }}" 
                  class="mt-3 d-flex gap-2">
                @csrf

                <select name="status" class="form-select w-auto">
                    <option value="Pending" {{ $leave->status=='Pending'?'selected':'' }}>Pending</option>
                    <option value="Approved" {{ $leave->status=='Approved'?'selected':'' }}>Approved</option>
                    <option value="Rejected" {{ $leave->status=='Rejected'?'selected':'' }}>Rejected</option>
                </select>

                <button type="submit" class="btn btn-primary">
                    Update Status
                </button>
            </form> --}}
    {{-- </td> --}}
   <td>
    <form method="POST"
          action="{{ route('admin.leaves.updateStatus',$leave->id) }}"
          class="d-flex align-items-center gap-2">
        @csrf

        <select name="status"
                class="form-select form-select-sm status-select
                {{ $leave->status == 'Approved' ? 'status-approved' :
                   ($leave->status == 'Rejected' ? 'status-rejected' : 'status-pending') }}"
                onchange="updateStatusColor(this)"
                {{ $leave->status != 'Pending' ? 'disabled' : '' }}>
            
            <option value="Pending" {{ $leave->status=='Pending'?'selected':'' }}>
                Pending
            </option>
            <option value="Approved" {{ $leave->status=='Approved'?'selected':'' }}>
                Approved
            </option>
            <option value="Rejected" {{ $leave->status=='Rejected'?'selected':'' }}>
                Rejected
            </option>
        </select>

        @if($leave->status == 'Pending')
            <button type="submit" class="btn btn-sm btn-outline-primary">
                Save
            </button>
        @endif
    </form>
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
