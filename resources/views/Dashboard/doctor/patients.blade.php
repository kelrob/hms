@inject('prescription','App\Models\Prescription')
@extends('Dashboard.template')

@section('wrapper')

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-users"></span> Patients</b>
                    </h3>
                </div>
                <!-- / Header Ends -->


                <div class="row mb">
                    <!-- page start-->
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <div class="adv-table">
                                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                                    <thead>
                                    <tr>
                                        <th>Patient ID</th>
                                        <th class="hidden-phone">Sex</th>
                                        <th class="hidden-phone">Blood Group</th>
                                        <th class="hidden-phone">Age</th>
                                        <th class="hidden-phone">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $info => $patients)
                                            <tr>
                                                <td>{{ $patients->userProfile->id }}</td>
                                                <td>{{ ucfirst($patients->userProfile->sex) }}</td>
                                                <td>{{ $patients->userProfile->blood_group }}</td>
                                                <td>{{ $patients->userProfile->age }}</td>
                                                <td>
                                                    <a data-toggle="modal" data-target="#history{{ $patients->userProfile->id }}" class="btn btn-default btn-round btn-sm">
                                                        <span class="fa fa-eye"></span>
                                                        View Patient History
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="history{{ $patients->userProfile->id }}" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="color: #fff; padding: 1%;" align="center">
                                                            <h3>Patient 00{{ $patients->userProfile->id }} Med History</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            @php ($allPrescription = $prescription::where('patient_id', '=', $patients->userProfile->user_id)->get())
                                                            @foreach($allPrescription as $myPrescription)
                                                                <div align="center">
                                                                    <h4 class="text-center">Date: {{ $myPrescription->created_at }}</h4>
                                                                    <p>Drugs Given: {{ $myPrescription->drug }}</p>
                                                                    <p>Interval: {{ ucwords($myPrescription->interval) }}</p>
                                                                    <p>Report: {{ ucwords($myPrescription->report) }}</p>
                                                                    <hr />
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
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

@endsection