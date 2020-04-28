@extends('Dashboard.template')

@section('wrapper')
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-stethoscope"></span> Prescriptions</b>

                        <span class="pull-right">
                            <small>
                                <a data-toggle="modal" data-target="#addPrescriptionModal" class="btn btn-theme03" style="border-radius: 15px;">
                                    <i class="fa fa-plus"></i>
                                    Add Prescription
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
                                        <th class="hidden-phone">Date</th>
                                        <th class="hidden-phone">Patient ID</th>
                                        <th class="hidden-phone">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($prescriptions as $prescription)
                                        <tr>
                                            <td>{{ $prescription->created_at }}</td>
                                            <td>00{{ $prescription->patient_id }}</td>
                                            <td>
                                                <a href="{{ url('/edit-prescription/' . $prescription->id) }}" class="btn btn-primary btn-round btn-sm">
                                                    <span class="fa fa-check"></span> &nbsp;
                                                    Edit
                                                </a>
                                                <!--&nbsp;
                                                <a href="#" class="btn btn-default btn-round btn-sm">
                                                    <span class="fa fa-eye"></span> &nbsp;
                                                    View Prescription
                                                </a>
                                                -->
                                                &nbsp;
                                                <a href="{{ url('/delete-prescription/' . $prescription->id) }}" class="btn btn-danger btn-round btn-sm">
                                                    <span class="fa fa-trash-o"></span> &nbsp;
                                                    Delete
                                                </a>
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
        <div class="modal fade" id="addPrescriptionModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #fff;" align="center">
                        <h3>Add Prescription</h3>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal style-form" action="{{ url('/add-prescription/post') }}" method="post" id="prescriptiontForm" autocomplete="off">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="drug" class="control-label col-md-3"><span class="pull-right">Drug Name</span></label>
                                <div class="col-md-7">
                                    <select name="drug" class="form-control" id="drug">
                                        <option value="">Select Drug</option>
                                        <option value="Benylin Chesty Cough - 300ml">Benylin Chesty Cough - 300ml</option>
                                        <option value="Paracetamol Capsule - 500mg">Paracetamol Capsule - 500mg</option>
                                        <option value="Eye Drops 7.5ml">Eye Drops 7.5ml</option>
                                        <option value="Iburofen 200mg">Iburofen 200mg</option>
                                        <option value="Postinor 300g">Postinor 300g</option>
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="form-group">
                                <label for="patient" class="control-label col-md-3"><span class="pull-right">Patient Name</span></label>
                                <div class="col-md-7">
                                    <select name="patient" class="form-control" id="patient">
                                        @foreach($users as $info => $patients)
                                            <option value="{{ $patients->userProfile->user_id }}">{{ ucwords($patients->userProfile->fullname) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="form-group">
                                <label for="interval" class="control-label col-md-3"><span class="pull-right">Intervals</span></label>
                                <div class="col-md-7">
                                    <select name="interval" class="form-control" id="interval">
                                        <option value="">Select Interval</option>
                                        <option value="once per day">Once Per Day (Mornings)</option>
                                        <option value="twice per day">Twice Per Day (Morning and Night)</option>
                                        <option value="thrice per day">Thrice Per Day (Morning, Noon and Night)</option>
                                    </select>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="form-group">
                                <label for="report" class="control-label col-md-3"><span class="pull-right">Repeort</span></label>
                                <div class="col-md-7">
                                    <textarea rows="4" cols="10" class="form-control" name="report" id="report" required></textarea>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" class="btn btn-primary" value="Give Prescription">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection