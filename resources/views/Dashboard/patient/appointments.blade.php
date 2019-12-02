@inject('userInfo', 'App\Models\UserProfile')
@extends('Dashboard.template')

@section('wrapper')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-calendar"></span> Appointments</b>
                        <span class="pull-right">
                                <small>
                                    <a data-toggle="modal" data-target="#applyAppointmentModal" class="btn btn-theme03" style="border-radius: 15px;">
                                        <i class="fa fa-envelope"></i>
                                        Apply for Appointment
                                    </a>
                                </small>
                            </span>
                    </h3>
                </div>
                <!-- / Header Ends -->

                @if (session('successMessage'))
                    <div class="alert alert-success">
                        <b>{{ session('successMessage') }}</b>
                    </div>
                @endif

                <div class="row mb">
                    <!-- page start-->
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <div class="adv-table table-responsive">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                    <tr>
                                        <th class="hidden-phone">Appointment Date</th>
                                        <th class="hidden-phone">Doctor</th>
                                        <th class="hidden-phone">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userAppointment as $appointment)
                                        <tr>
                                            <td>{{ $appointment->appointment_date }}</td>
                                            <td>{{ $userInfo->find($appointment->user_id)->fullname }}</td>
                                            <td>
                                                @if ($appointment->status  == 0)
                                                    <b>Pending</b>
                                                @elseif ($appointment->status  == 1)
                                                    <b>Approved</b>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- page end-->
                </div>


            </div>
        </div>
        <!-- /row -->
    </section>

    @include('includes.modals')
@endsection