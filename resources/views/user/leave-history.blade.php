@extends('user.layouts.app')
@section('title','Leave History')

@section('content')
<div class="card">
    <div class="card-header">Leave History</div>
  
    @if($leaves->count() >= 0)
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Leave Type</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Status</th>
                    
                    <th>Applied On</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaves as $leave)
                <tr>
                    
                    <td>{{$leave->leave_type}}</td>
                    <td>{{ $leave->from_date }}</td>
                    <td>{{$leave->to_date}}</td>
                    <td>
                        <span class="badge 
                            {{ $leave->status == 'Approved' ? 'bg-success' : 
                               ($leave->status == 'Rejected' ? 'bg-danger' : 'bg-warning') }}">
                            {{ $leave->status }}
                        </span>
                    </td>
                    <td>{{ $leave->created_at->format('d M Y') }}</td>
                    

                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-muted mt-3">No leave records found.</p>
        
        @endif
    </div>
</div>
@endsection
