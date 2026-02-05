@extends('admin.layouts.app')

@section('title','Leave Details')

@section('content')
<div class="container-fluid">

    <!-- Employee Details -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Employee Details</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><b>Name:</b> {{ $leave->user->employee->firstname }} {{ $leave->user->employee->lastname}}</p>
                    <p><b>Employee ID:</b> {{ $leave->user->employee->emp_number }}</p>
                      <p><b>Department:</b>
        {{ $leave->user->employee->department ?? 'N/A' }}
    </p>
                    <p><b>Email:</b>
        {{ $leave->user->email ?? 'N/A' }}
    </p>
                    <p><b>Mobile:</b>
        {{ $leave->user->employee->mno ?? 'N/A' }}
    </p>
                </div>

                <div class="col-md-6">
                    <p><b>Gender:</b>
        {{ $leave->user->employee->gender ?? 'N/A' }}
    </p>
                     <p><b>DOB:</b>
        {{ $leave->user->employee->birthdate ?? 'N/A' }}
    </p>
                    <p><b>Address:</b>
        {{ $leave->user->employee->address ?? 'N/A' }}
    </p>

                    <p><b>Country:</b>
        {{ $leave->user->employee->country ?? 'N/A' }}
    </p>
                    <p><b>City:</b>
        {{ $leave->user->employee->city ?? 'N/A' }}
    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Leave Details -->
    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Leave Details</h5>
        </div>

        <div class="card-body">
            <p><b>Type:</b> {{ $leave->leave_type }}</p>
            <p><b>From:</b> {{ $leave->from_date }}</p>
            <p><b>To:</b> {{ $leave->to_date }}</p>
            <p><b>Reason:</b> {{ $leave->description }}</p>
            <p><b>Apply Date:</b> {{ $leave->created_at->format('d-m-Y') }}</p>

            <p>
                <b>Status:</b>
                <span class="badge 
                    @if($leave->status=='Pending') bg-warning
                    @elseif($leave->status=='Approved') bg-success
                    @else bg-danger @endif">
                    {{ $leave->status }}
                </span>
            </p>

            <!-- Status Update -->
           
        </div>
    </div>

    <!-- Past Leaves -->
    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Past Leaves</h5>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Type</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($pastLeaves as $p)
                    <tr>
                        <td>{{ $p->leave_type }}</td>
                        <td>{{ $p->from_date }} to {{ $p->to_date }}</td>
                        <td>
                            <span class="badge 
                                @if($p->status=='Pending') bg-warning
                                @elseif($p->status=='Approved') bg-success
                                @else bg-danger @endif">
                                {{ $p->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No past leaves found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
