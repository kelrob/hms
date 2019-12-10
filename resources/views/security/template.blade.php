<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <title>{{ env('PROJECT_TITLE') }}</title>

    <!-- Favicons -->
    <link href="{{ url('img/favicon.png') }}" rel="icon">
    <link href="{{ url('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ url('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ url('lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    <link href="{{ url('css/style-responsive.css') }}" rel="stylesheet">
</head>

<body>
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
*********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">

        @yield('form')

    </div>
</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ url('lib/jquery/jquery.min.js') }}"></script>
<script src="{{ url('lib/bootstrap/js/bootstrap.min.js') }}"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="text/javascript" src="{{ url('lib/jquery.backstretch.min.js') }}"></script>
<script>
    $.backstretch("img/login-bg22.jpg", {
        speed: 500
    });
</script>
<script type="text/javascript">
    $('#refresh').click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'GET',
            url:'refreshcaptcha',
            success:function(data){
                $('#cap').html(data.captcha);
                //console.log(data.captcha)
                //$(".captcha span");

            }
        });
    });
</script>
</body>

</html>