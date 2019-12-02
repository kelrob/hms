@extends('Dashboard.template')

@section('wrapper')

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-9 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="color: #4285F4">i-</span>MED Hospital Management information system</b>
                    </h3>
                </div>
                <!-- / Header Ends -->

                <!-- Patient and Doc Statistics -->
                <div class="row">

                    <!-- APPOINTMENT PANEL -->
                    <div class="col-md-6 mb">
                        <div class="twitter-panel pn">
                            <i class="fa fa-calendar fa-4x"></i>
                            <p>Total No of Pending Appointment.</p>
                            <h1 class="user">{{ $appointmentCount }}</h1>
                        </div>
                    </div>
                    <!-- /APPOINTMENT PANEL -->

                    <!-- PRESCRIPTION PANEL -->
                    <div class="col-md-6 mb">
                        <div class="twitter-panel pn" style="background-color: #ED5565;">
                            <i class="fa fa-users fa-4x"></i>
                            <p>Total No of Patients.</p>
                            <h1 class="user">{{ $patientCount }}</h1>
                        </div>
                    </div>
                    <!-- /PRESCRIPTION PANEL -->

                </div>
                <!-- /End Patient and Doc Statistics -->

            </div>
            <!-- /col-lg-9 END SECTION MIDDLE -->
            <!-- **********************************************************************************************************************************************************
                RIGHT SIDEBAR CONTENT
                *********************************************************************************************************************************************************** -->
            <div class="col-lg-3 ds">

                <!-- CALENDAR-->
                <div id="calendar" class="mb">
                    <div class="panel green-panel no-margin">
                        <div class="panel-body">
                            <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                <div class="arrow"></div>
                                <h3 class="popover-title" style="disadding: none;"></h3>
                                <div id="date-popover-content" class="popover-content"></div>
                            </div>
                            <div id="my-calendar"></div>
                        </div>
                    </div>
                </div>
                <!-- / calendar -->
            </div>
            <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
    </section>

@endsection


