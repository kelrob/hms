@inject('userInfo', 'App\Models\UserProfile')
@extends('Dashboard.template')

@section('wrapper')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-medkit"></span> My Prescription</b>
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
                                        <th class="hidden-phone">Date Issued</th>
                                        <th class="hidden-phone">Doctor</th>
                                        <th class="hidden-phone">Drug</th>
                                        <th class="hidden-phone">Interval</th>
                                        <th class="hidden-phone">Report</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($userPrescription as $prescription)
                                        <tr>
                                            <td>{{ $prescription->created_at }}</td>
                                            <td>{{ $userInfo::find($prescription->user_id)->fullname }}</td>
                                            <td>{{ $prescription->drug }}</td>
                                            <td>{{ ucwords($prescription->interval) }}</td>
                                            <td>{{ $prescription->report }}</td>
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