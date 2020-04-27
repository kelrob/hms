<!-- Add Doctor Modal Begins -->
<div class="modal fade" id="addDoctorModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fff;">

            </div>
            <div class="modal-body">
                <div class="alert alert-info" id="response" style="display: none" align="center">
                    <p><b>Please wait, Adding Doctor<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i></b></p>
                </div>
                <div class="alert alert-success" id="" style="display:none; font-weight: bold" align="center"></div>
                <div class="alert alert-danger" id="" style="display:none; font-weight: bold" align="center"></div>
                <form class="form-horizontal  style-form" method="post" action="{{ url('/doctors/post') }}" id="addDoctorForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3"><span class="pull-right">Name</span></label>
                        <div class="col-md-7">
                            <input type="text" id="fullname" name="fullname" class="form-control input-sm" required>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-md-3">
                            <span class="pull-right">Email</span>
                        </label>
                        <div class="col-md-7">
                            <input type="text" id="email" name="email" class="form-control input-sm" required>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="file" class="control-label col-md-3">
                            <span class="pull-right">Image</span>
                        </label>
                        <div class="col-md-7">
                            <input type="file" id="file" name="file" class="form-control input-sm" required>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label col-md-3">
                            <span class="pull-right">Address</span>
                        </label>
                        <div class="col-md-7">
                            <textarea class="form-control input-sm" name="address" id="address" rows="5" cols="5" required></textarea>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label col-md-3">
                            <span class="pull-right">Phone</span>
                        </label>
                        <div class="col-md-7">
                            <input type="number" name="phone" class="form-control input-sm" id="phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="department" class="control-label col-md-3">
                            <span class="pull-right">Department</span>
                        </label>
                        <div class="col-md-7">
                            <select class="form-control" id="department" name="department" required>
                                <option value="">Select Department</option>
                                <option value="surgery">Surgery</option>
                                <option value="neurologist">Neurologist</option>
                                <option value="diagnostic">Diagnostic</option>
                                <option value="dentist">Dentist</option>
                                <option value="ophthalmology">Ophthalmology</option>
                                <option value="emergency">Emergency</option>
                                <option value="cardiologist">Cardiologist</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sex" class="control-label col-md-3">
                            <span class="pull-right">Sex</span>
                        </label>
                        <div class="col-md-7">
                            <select class="form-control" id="sex" name="sex" required>
                                <option value="">Select Sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" align="center">
                        <input type="submit" class="btn btn-primary" style="width: 70%;" />
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Add Doctor Modal Ends -->

<!-- Add a new Patient Modal -->
<div class="modal fade" id="addPatientModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fff;" align="center">
                Add a Patient
            </div>
            <div class="modal-body">
                <form class="form-horizontal style-form" action="{{ url('/patients/post') }}" method="post" id="addPatientForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3"><span class="pull-right">Name</span></label>
                        <div class="col-md-7">
                            <input type="text" id="name" name="fullname" class="form-control input-sm" required>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label col-md-3">
                            <span class="pull-right">Email</span>
                        </label>
                        <div class="col-md-7">
                            <input type="text" id="email" name="email" class="form-control input-sm" required>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="control-label col-md-3">
                            <span class="pull-right">Address</span>
                        </label>
                        <div class="col-md-7">
                            <textarea class="form-control input-sm" name="address" id="address" rows="5" cols="5" required></textarea>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label col-md-3">
                            <span class="pull-right">Phone</span>
                        </label>
                        <div class="col-md-7">
                            <input type="number" name="phone" class="form-control input-sm" id="phone">
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="sex" class="control-label col-md-3">
                            <span class="pull-right">Sex</span>
                        </label>
                        <div class="col-md-7">
                            <select class="form-control" id="sex" name="sex">
                                <option value="">Select Sex</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="age" class="control-label col-md-3">
                            <span class="pull-right">Age</span>
                        </label>
                        <div class="col-md-7">
                            <input type="number" id="age" name="age" class="form-control">
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="blood_group" class="control-label col-md-3">
                            <span class="pull-right">Blood Group</span>
                        </label>
                        <div class="col-md-7">
                            <select class="form-control" id="blood_group" name="blood_group">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group" align="center">
                        <input type="submit" class="btn btn-primary" value="Add Patient">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Add Patient Modal ends -->

<!-- Apply Appointment Modal -->
<div class="modal fade" id="applyAppointmentModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #fff;" align="center">
                <h3>Apply for Appointment</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal style-form" action="{{ url('/book-appointment/post') }}" method="post" id="applyAppointmentForm" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="date" class="control-label col-md-3"><span class="pull-right">Date</span></label>
                        <div class="col-md-7">
                            <input id="date" name="date" class="form-control form-control-inline input-medium default-date-picker" size="16" type="text" value="" required>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group">
                        <label for="doctor" class="control-label col-md-3"><span class="pull-right">Doctor</span></label>
                        <div class="col-md-7">
                            <select class="form-control" id="doctor" name="doctor" required>
                                <option value="">Select a Doctor</option>
                                @foreach($users as $info => $doctor)
                                    <option value="{{ $doctor->userProfile->id }}">{{ ucwords($doctor->userProfile->fullname) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <div class="form-group" align="center">
                        <input type="submit" class="btn btn-primary" value="Request Appointment">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Apply Appointment Modal ends-->

