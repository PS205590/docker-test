<div class="bg-dark" id="sidebar" style="height: 100vh;"> <!-- Change background color to dark -->
    <div class="sidebar-heading"></div>
    <ul class="list-group" >

        @if (Auth::check() && Auth::user()->roles->contains(1))

            <li class="list-group-item"><a href="{{ route('management.index') }}">Thuis</a></li>
            <li class="list-group-item"><a href="{{ route('management.inventory') }}">Inventaris</a></li>
            <li class="list-group-item"><a href="{{ route('management.sales') }}">Verkoop</a></li>
            <li class="list-group-item"><a href="{{ route('management.wholesale') }}">Inkoop</a></li>
            {{-- <li class="list-group-item"><a href="{{ route('management.product') }}">Product information</a></li> --}}
        @elseif (Auth::check() && Auth::user()->roles->contains(2))
            <li class="list-group-item"><a href="{{ route('employee.welcome') }}">Thuis</a></li>
            <li class="list-group-item"><a href="{{ route('employee.shifts') }}">Dienst</a></li>
            <li class="list-group-item"><a href="{{ route('employee.absence') }}">Absentie</a></li>
            <li class="list-group-item"><a href="{{ route('employee.checkout') }}">Kassa</a></li>


        @endif
    </ul>
</div>
