@extends('admin.layouts.app')
@section('title','Manage Leave Type')

@section('content')
<div class="card">
    <div class="card-header">Manage Leave Type</div>

    @if($leave_types->count() > 0)
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Leave Type</th>
                    <th>Leave Description</th>
                    
                    <th>Creation Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leave_types as $leave_type)
                <tr>
                    
                    <td>{{ $leave_type->Leave_Type }}</td>
                    <td>{{ $leave_type->Leave_Description }}</td>
                   
                    <td>{{ $leave_type->created_at->format('d M Y') }}</td>
                    <td>
    <!-- Edit -->
    <a href="{{ route('admin.leave-type.edit', $leave_type->id) }}"
   class="btn btn-sm btn-primary">
    ✏️
</a>

    <!-- Delete -->
    <form action="{{ route('admin.leave-type.destroy', $leave_type->id) }}"
      method="POST"
      style="display:inline;"
      onsubmit="return confirm('Are you sure you want to delete?')">
    @csrf
    @method('DELETE')

    <button class="btn btn-sm btn-danger">🗑</button>
</form>

</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="text-muted mt-3">No records found.</p>
    @endif
</div>
@endsection
