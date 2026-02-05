@php
    use App\Models\AdminProfile;
    use Illuminate\Support\Facades\Auth;
    $adminProfile=AdminProfile::where('email',Auth::user()->email)->first();
@endphp
@endphp
<div class="sidebar">
    <div class="sidebar-header">
        {{-- <span class="menu-toggle">&#9776;</span> --}}
        <span class="brand">ADMIN</span>
    </div>

    <div class="sidebar-user text-center">
        @if($adminProfile && $adminProfile->image)
        <img 
            src="{{ asset('assets/admin_images/'.$adminProfile->image) }}"
            width="60"
            height="60"
            style="border-radius:50%; object-fit:cover;"
        >
    @else
        <img 
            src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
            width="60"
        >
    @endif
        <h6 class="mt-2">Admin</h6>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="icon">🏠</i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.profile.show') }}">
                <i class="icon">👤</i> Profile
            </a>
        </li>


        <!-- Department -->
        <li class="dropdown">
            <a href="#">
                <i class="icon">🏢</i> Department
                <span class="arrow">›</span>
            </a>
            <ul>
                <li><a href="{{ route('admin.department.create') }}">Add Department</a></li>
                <li><a href="{{ route('admin.department.index') }}">Manage Department</a></li>
            </ul>
        </li>

        <!-- Leave Type -->
        <li class="dropdown">
            <a href="#">
                <i class="icon">📄</i> Leave Type
                <span class="arrow">›</span>
            </a>
            <ul>
                <li><a href="{{ route('admin.leave-type.create') }}">Add Leave Type</a></li>
                <li><a href="{{ route('admin.leave-type.index') }}">Manage Leave Type</a></li>
            </ul>
        </li>

        <!-- Employees -->
        <li class="dropdown">
            <a href="#">
                <i class="icon">👤</i> Employees
                <span class="arrow">›</span>
            </a>
            <ul>
               <li><a href="{{ route('admin.employee.create') }}">Add Employee</a></li>

                <li><a href="{{ route('admin.employee.index') }}">Manage Employee</a></li>
            </ul>
        </li>

        <!-- Leave Management -->
        <li class="dropdown">
            <a href="#">
                <i class="icon">🗂</i> Leave Management
                <span class="arrow">›</span>
            </a>
            <ul>
                <li><a href="{{ route('admin.leaves.all') }}">All Leaves</a></li>
                <li><a href="{{ route('admin.leaves.pending') }}">Pending Leaves</a></li>
                <li><a href="{{ route('admin.leaves.approved') }}">Approved Leaves</a></li>
                <li><a href="{{ route('admin.leaves.rejected') }}">Not Approved Leaves</a></li>
            </ul>
        </li>

        

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">Sign Out</button>
            </form>
        </li>
    </ul>
</div>
