@extends('admin.layouts.app')
@section('title','Leave History')

@section('content')
<div class="card">
    <div class="card-header">Manage Employees</div>

    @if($employees->count() > 0)
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    
                    <th>Emp Id</th>
                    <th>Full Name</th>
                    <th>Department</th>
                    <th>Email</th>
                 
                    <th>Profile Creation Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    
                    <td><span class="badge bg-secondary">{{ $employee->emp_number }}</span></td>
                    <td>{{ $employee->firstname }} {{ $employee->lastname}}</td>
                    <td>{{ $employee->department }}</td>
                    <td>{{ $employee->email }}</td>
                    
                    <td>{{ $employee->created_at->format('d M Y') }}</td>
                    <td><a href="{{ route('admin.employee.edit', $employee->id) }}"
                        class="btn btn-sm btn-primary">✏️</a>
    
                    <form action="{{ route('admin.employee.destroy', $employee->id) }}"
                    method="POST" style="display:inline;"
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
        <p class="text-muted mt-3">No department records found.</p>
    @endif
</div>
@endsection
