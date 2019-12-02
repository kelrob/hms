@extends('Dashboard.template')

@section('wrapper')

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-stethoscope"></span> MED Doctors</b>

                        <span class="pull-right">
                                <small>
                                    <a data-toggle="modal" data-target="#addDoctorModal" class="btn btn-theme03" style="border-radius: 15px;">
                                        <i class="fa fa-plus"></i>
                                        Add a doctor
                                    </a>
                                </small>
                            </span>

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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th class="hidden-phone">Phone</th>
                                        <th class="hidden-phone">Sex</th>
                                        <th class="hidden-phone">Department</th>
                                        <th class="hidden-phone">Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $info => $doctor)
                                        <tr>
                                            <td><img src="img/friends/user.jpg" class="img-rounded" style="width: 40px; height: 40px;" /> </td>
                                            <td>{{ $doctor->userProfile->fullname }}</td>
                                            <td>{{ $doctor->userProfile->email }}</td>
                                            <td>{{ $doctor->userProfile->phone }}</td>
                                            <td>{{ ucfirst($doctor->userProfile->sex) }}</td>
                                            <td>{{ $doctor->userProfile->doc_dept }}</td>
                                            <td>
                                                <a href="{{ url('/edit-doctor/' . $doctor->userProfile->id) }}" class="btn btn-primary btn-round">
                                                    <span class="fa fa-pencil"></span>
                                                    Edit
                                                </a>
                                                &nbsp;
                                                <a data-toggle="modal" data-target="#deleteModal{{ $doctor->userProfile->user_id }}" class="btn btn-danger btn-round">
                                                    <span class="fa fa-trash"></span>
                                                    Delete
                                                </a>

                                            </td>
                                        </tr>
                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $doctor->userProfile->user_id }}" role="dialog" style="margin-top: 5%;">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h4 style="font-weight: bold; color: #000;" class="text-center">Are you sure you want to delete this information?</h4>
                                                        <p align="center" style="margin-top: 2%;">
                                                            <a href="{{ url('/delete-doctor/' . $doctor->userProfile->user_id)}}" class="btn btn-danger btn-round btn-sm">Delete</a>
                                                            &nbsp;
                                                            <a data-dismiss="modal" class="btn btn-info btn-round btn-sm">Cancel</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Delete Modal -->
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