@extends('Dashboard.template')

@section('wrapper')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-calendar"></span> Appointments</b>
                    </h3>
                </div>
                <!-- / Header Ends -->

                <div class="row mb">
                    <!-- page start-->
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <div class="adv-table table-responsive">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                    <tr>
                                        <th class="hidden-phone">Appointment Date</th>
                                        <th class="hidden-phone">Patient ID</th>
                                        <th class="hidden-phone">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($docAppointment as $appointment)
                                        <tr>
                                            <td>{{ $appointment->appointment_date }}</td>
                                            <td>PAT00{{ $appointment->patient_id }}</td>
                                            @if ($appointment->status == 0)
                                                <td>
                                                    <a href="{{ url('/approve-appointment/' . $appointment->id . '/approve') }}" class="btn btn-primary btn-round btn-sm">
                                                        <span class="fa fa-check"></span> &nbsp;
                                                        Approve
                                                    </a>
                                                    &nbsp;
                                                    <a href="{{ url('/approve-appointment/' . $appointment->id . '/cancel') }}" class="btn btn-danger btn-round btn-sm">
                                                        <span class="fa fa-times"></span> &nbsp;
                                                        Cancel
                                                    </a>
                                                </td>
                                            @elseif ($appointment->status == 1)
                                                <td><b style="background-color: #4cae4c; color: #fff; padding: 2%;">Approved</b></td>
                                            @elseif ($appointment->status == 2)
                                                <td><b style="background-color: #C9302C; color: #fff; padding: 2%;">Cancelled</b></td>
                                            @endif
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
    </section>
@endsection