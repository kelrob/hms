@extends('Dashboard.template')

@section('wrapper')

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-stethoscope"></span>
                            Edit Patient <b style="color: #2e6da4">{{ $patient->fullname }}</b> account
                        </b>
                    </h3>
                </div>
                <!-- / Header Ends -->

                <div class="row mb">
                    <div class="col-lg-12">
                        @if ($errors->any())
                            <div class="alert alert-danger" align="center" style="font-weight: bold;">
                                {!! implode('<br />', $errors->all(':message')) !!}
                            </div>
                        @endif
                        @isset ($message)
                            <div class="alert alert-success alert-dismissible" align="center" style="font-weight: bold">
                                {{ $message }}
                                <style>
                                    #edit-form{ display: none;}
                                </style>
                            </div>
                        @endisset
                        <form method="post" action="{{ url('edit-patient/'. $patient->id) }}" id="edit-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="fullname">Name</label>
                                <input type="text" name="fullname" value="{{ $patient->fullname }}" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $patient->email }}" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="number">Phone</label>
                                <input type="number" name="phone" value="{{ $patient->phone }}" class="form-control" id="number" required>
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <select name="blood_group" id="blood_group" class="form-control" required>
                                    <option value="{{ $patient->blood_group }}">{{ ucfirst($patient->blood_group) }}</option>
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
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select name="sex" id="sex" class="form-control" required>
                                    <option value="{{ $patient->sex }}">{{ ucfirst($patient->sex) }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" name="age" class="form-control" value="{{ $patient->age }}" id="age">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="4" cols="5" required>{{ $patient->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit Update">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection