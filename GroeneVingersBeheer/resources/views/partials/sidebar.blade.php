<div class="bg-dark" id="sidebar" style="height: 100vh;"> <!-- Change background color to dark -->
    <div class="sidebar-heading"></div>
    <ul class="list-group" >
        @if (Auth::check() && Auth::user()->roles->contains(1))
            <li class="list-group-item"><a href="{{ route('management.index') }}">Home</a></li>
            <li class="list-group-item"><a href="{{ route('management.inventory') }}">Inventory Management</a></li>
        @elseif (Auth::check() && Auth::user()->roles->contains(2))
            <li class="list-group-item"><a href="{{ route('employee.welcome') }}">Home</a></li>
            <li class="list-group-item"><a href="{{ route('employee.shifts') }}">Shifts</a></li>
            <li class="list-group-item"><a href="{{ route('employee.absence') }}">Absence</a></li>


        @endif
    </ul>
</div>
