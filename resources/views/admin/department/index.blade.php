@extends('admin.layouts.app')
@section('title','Leave History')

@section('content')
<div class="card">
    <div class="card-header">Manage Departments</div>

    @if($departments->count() > 0)
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Sr No</th>
                    <th>Dept Name</th>
                    <th>Dept Short Name</th>
                    <th>Dept Code</th>
                    <th>Creation Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($departments as $department)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $department->Department_Name }}</td>
                    <td>{{ $department->Department_Short_Name }}</td>
                    <td>{{ $department->Department_Code }}</td>
                    <td>{{ $department->created_at->format('d M Y') }}</td>
                    <td><a href="{{ route('department.edit', $department->id) }}"class="btn btn-sm btn-primary">✏️</a>
                    <form action="{{ route('department.destroy', $department->id) }}" 
                        method="POST" style="display:inline;" 
                        onsubmit="return confirm('Are you sure you want to delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">🗑</button>
                    </form></td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="text-muted mt-3">No department records found.</p>
    @endif
</div>
@endsection
