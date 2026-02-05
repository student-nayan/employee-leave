<div class="sidebar p-3">

    <div class="text-center mb-4">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="70">
        <h6 class="mt-2">{{ Auth::user()->name }}</h6>
        
    </div>

    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('user.profile') }}">My Profile</a>
        </li>
        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('user.change-password') }}">Change Password</a>

        </li>

        <li class="nav-item mt-3 fw-bold text-muted">Leaves</li>

        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('leave.create') }}">Apply Leave</a>

        </li>
        <li class="nav-item mb-2">
            <a class="nav-link" href="{{ route('user.leave-history') }}">Leave History</a>
        </li>

        <li class="nav-item mt-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-link nav-link text-danger p-0">Sign Out</button>
            </form>
        </li>
    </ul>
</div>
