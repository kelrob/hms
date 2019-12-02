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
                <div class="row mt">

                    <!-- Doctor Statistics -->
                    <div class="col-md-6 col-sm-6 mb">
                        <div class="grey-panel pn donut-chart">
                            <div class="grey-header">
                                <h5><b>Available Doctors</b></h5>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <h2>{{ $totalDocs }}</h2>
                                    <p>Available Doctors</p>
                                    <hr  style="margin: 0; padding: 0;"/>
                                </div>
                                <div class="col-sm-6 col-xs-16" style="border-right: 1px solid #999;">
                                    <h4>{{ $maleDocCount }}</h4>
                                    <p>Male Docs</p>
                                </div>
                                <div class="col-sm-6 col-xs-16">
                                    <h4>{{ $femaleDocCount }}</h4>
                                    <p>Female Docs</p>
                                </div>
                            </div>
                        </div>
                        <!-- /grey-panel -->
                    </div>
                    <!-- / Doctor Statistics -->

                    <!-- Patient Statistics -->
                    <div class="col-md-6 col-sm-6 mb">
                        <div class="darkblue-panel pn">
                            <div class="darkblue-header">
                                <h5><b>Patients Statistics</b></h5>
                            </div>
                            <canvas id="serverstatus02" height="120" width="120"></canvas>
                            <script>
                                var doughnutData = [{
                                    value: {{ $malePercentage }},
                                    color: "#1c9ca7"
                                },
                                    {
                                        value: {{ $femalePercentage }},
                                        color: "#f68275"
                                    }
                                ];
                                var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
                            </script>
                            <p>Patients Statistics today</p>
                            <footer>
                                <div class="pull-left">
                                    <h5><i class="fa fa-male"></i> {{ $malePercentage }}% Male Patient</h5>
                                </div>
                                <div class="pull-right">
                                    <h5>{{ $femalePercentage }}% Female Patient <i class="fa fa-female"></i> </h5>
                                </div>
                            </footer>
                        </div>
                        <!--  /darkblue panel -->
                    </div>
                    <!-- / Patient Statistics -->

                </div>
                <!-- /End Patient and Doc Statistics -->

                <!-- Extra Statistics
                <div class="row">

                    <div class="col-md-4 mb">
                        <div class="twitter-panel pn">
                            <i class="fa fa-calendar fa-4x"></i>
                            <p>Total No of Appointment booked.</p>
                            <h1 class="user">5</h1>
                        </div>
                    </div>

                    <div class="col-md-4 mb">
                        <div class="twitter-panel pn" style="background-color: #ED5565;">
                            <i class="fa fa-pencil-square fa-4x"></i>
                            <p>Total No of Prescription.</p>
                            <h1 class="user">10</h1>
                        </div>
                    </div>



                    <div class="col-md-4 mb">
                        <div class="twitter-panel pn" style="background-color: #4285F4;">
                            <i class="fa fa-medkit fa-4x"></i>
                            <p>Available Drugs.</p>
                            <h1 class="user">19</h1>
                        </div>
                    </div>


                </div>
                 / Extra Statistics ends -->

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