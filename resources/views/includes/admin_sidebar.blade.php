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
                <a class="" href="{{ env('PROJECT_DOMAIN') }}admin">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ env('PROJECT_DOMAIN') }}doctors">
                    <i class="fa fa-stethoscope"></i>
                    <span>Doctors </span>
                </a>
            </li>
            <li>
                <a href="{{ env('PROJECT_DOMAIN') }}patients">
                    <i class="fa fa-users"></i>
                    <span>Patients </span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>