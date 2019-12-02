@extends('Dashboard.template')

@section('wrapper')
    
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-users"></span> MED Patients</b>


                    </h3>
                </div>
                <!-- / Header Ends -->
            </div>
        </div>

        <div class="row mb">
            <div class="col-lg-12" align="center">
                @isset($errorResponse)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errorResponse as $errors)
                                <li><b>{{ $errors }}</b></li>
                            @endforeach
                        </ul>
                    </div>
                    <p><a href="{{ env('PROJECT_DOMAIN') }}patients" class="btn btn-primary">Go Back</a></p>
                @endisset

                @isset($successResponse)
                    <div class="alert alert-success">
                        <p><b>{!! $successResponse !!} </b></p>
                    </div>
                    <p><a href="{{ env('PROJECT_DOMAIN') }}patients " class="btn btn-primary">Go Back</a></p>
                @endisset
            </div>
        </div>
    </section>
    
@endsection