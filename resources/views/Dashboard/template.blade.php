<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('PROJECT_TITLE') }}</title>

    <!-- Favicons -->
    <link href="{{ url('img/favicon.png') }}" rel="icon">
    <link href="{{ url('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ url('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/zabuto_calendar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('lib/gritter/css/jquery.gritter.css') }}" />
    <link href="{{ url('lib/advanced-datatable/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ url('lib/advanced-datatable/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('lib/advanced-datatable/css/DT_bootstrap.css') }}" />
    @if ($user['profile_type'] == 'patient')
        <link rel="stylesheet" type="text/css" href="{{ url('lib/bootstrap-datepicker/css/datepicker.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('lib/bootstrap-daterangepicker/daterangepicker.css') }}" />
    @endif

    <!-- Custom styles for this template -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="{{ url('css/style-responsive.css') }}" rel="stylesheet">
    <script src="{{ url('lib/chart-master/Chart.js') }}"></script>

</head>

<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="" class="logo"><b><strong style="text-transform: lowercase;">i-</strong><span>Med</span></b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">

        </div>
        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li><a class="logout" href="{{ url('/logout') }}">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        @if ($user['profile_type'] == 'admin')
            @include('includes.admin_sidebar')
        @elseif ($user['profile_type'] == 'doctor')
            @include('includes.doctor_sidebar')
        @elseif ($user['profile_type'] == 'patient')
            @include('includes.patient_sidebar')
        @endif

        <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        @yield('wrapper')
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            <p>
                &copy; Copyrights <strong>i-Med</strong>. All Rights Reserved
            </p>
            <div class="credits">

                Created with love
            </div>
            <a href="#" class="go-top">
                <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </footer>
    <!--footer end-->
</section>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ url('lib/jquery/jquery.min.js') }}"></script>

<script src="{{ url('lib/bootstrap/js/bootstrap.min.js') }}"></script>
<script class="include" type="text/javascript" src="{{ url('lib/jquery.dcjqaccordion.2.7.js') }}"></script>
<script src="{{ url('lib/jquery.scrollTo.min.js') }}"></script>
<script src="{{ url('lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
<script src="{{ url('lib/jquery.sparkline.js') }}"></script>
<!--common script for all pages-->
<script src="{{ url('lib/common-scripts.js') }}"></script>
<script type="text/javascript" src="{{ url('lib/gritter/js/jquery.gritter.js') }}"></script>
<script type="text/javascript" src="{{ url('lib/gritter-conf.js') }}"></script>
<!--script for this page-->
<script src="{{ url('lib/sparkline-chart.js') }}"></script>
<script src="{{ url('lib/zabuto_calendar.js') }}"></script>
<script type="text/javascript" language="javascript" src="{{ url('lib/advanced-datatable/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ url('lib/advanced-datatable/js/DT_bootstrap.js') }}"></script>

@if ($user['profile_type'] == 'patient')
    <script type="text/javascript" src="{{url('lib/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{ url('lib/bootstrap-daterangepicker/date.js') }}"></script>
    <script src="{{ url('lib/advanced-form-components.js') }}"></script>
@endif

<!-- Custom Js -->
<script type="text/javascript">
    $(document).ready(function() {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome back {{ $user['fullname'] }}!',
            // (string | mandatory) the text inside the notification
            text: 'It is great to have you back, Have fun and enjoy your day.',
            // (string | optional) the image to display on the left
            image: 'img/friends/user.jpg',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: false,
            // (int | optional) the time you want it to be alive for before fading out
            time: 8000,
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
    });
</script>
<script type="application/javascript">
    $(document).ready(function() {
        $("#date-popover").popover({
            html: true,
            trigger: "manual"
        });
        $("#date-popover").hide();
        $("#date-popover").click(function(e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function() {
                return myDateFunction(this.id, false);
            },
            action_nav: function() {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [{
                type: "text",
                label: "Special event",
                badge: "00"
            },
                {
                    type: "block",
                    label: "Regular event",
                }
            ]
        });
    });

    function myNavFunction(id) {
        $("#date-popover").hide();
        var nav = $("#" + id).data("navigation");
        var to = $("#" + id).data("to");
        console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
</script>
<script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
        var aData = oTable.fnGetData(nTr);
        var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
        sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
        sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
        sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
        sOut += '</table>';

        return sOut;
    }

    $(document).ready(function() {
        /*
         * Insert a 'details' column to the table

        var nCloneTh = document.createElement('th');
        var nCloneTd = document.createElement('td');
        nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
        nCloneTd.className = "center";

        $('#hidden-table-info thead tr').each(function() {
            this.insertBefore(nCloneTh, this.childNodes[0]);
        });

        $('#hidden-table-info tbody tr').each(function() {
            this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
        });
        */
        /*
         * Initialse DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#hidden-table-info').dataTable({
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [0]
            }],

        });

        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        $('#hidden-table-info tbody td img').live('click', function() {
            var nTr = $(this).parents('tr')[0];
            if (oTable.fnIsOpen(nTr)) {
                /* This row is already open - close it */
                this.src = "lib/advanced-datatable/media/images/details_open.png";
                oTable.fnClose(nTr);
            } else {
                /* Open this row */
                this.src = "lib/advanced-datatable/images/details_close.png";
                oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
            }
        });
    });
</script>
</body>

</html>
