<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="#">
                    <img src="{{ url('img/friends/user.jpg') }}" class="img-circle" width="80">
                </a>
            </p>
            <h5 class="centered">{{ $user['fullname'] }}</h5>
            <li class="mt">
                <a href="{{ url('/doctor-dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/doctor-appointment') }}">
                    <i class="fa fa-calendar"></i>
                    <span>Appointment </span>
                </a>
            </li>
            <li>
                <a href="{{ url('/doctor-prescription') }}">
                    <i class="fa fa-stethoscope"></i>
                    <span>Prescription </span>
                </a>
            </li>
            <li>
                <a href="{{ url('/doctor-patients') }}">
                    <i class="fa fa-users"></i>
                    <span>Patients</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>