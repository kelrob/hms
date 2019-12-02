@extends('Dashboard.template')

@section('wrapper')

    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-stethoscope"></span>
                            Edit Doctor <b style="color: #2e6da4">{{ $doctor->fullname }}</b> account
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
                        <form method="post" action="{{ url('edit-doctor/'. $doctor->id) }}" id="edit-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="fullname">Name</label>
                                <input type="text" name="fullname" value="{{ $doctor->fullname }}" class="form-control" id="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" value="{{ $doctor->email }}" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="number">Phone</label>
                                <input type="number" name="phone" value="{{ $doctor->phone }}" class="form-control" id="number" required>
                            </div>
                            <div class="form-group">
                                <label for="department">Department</label>
                                <select name="doc_dept" id="department" class="form-control" required>
                                    <option value="{{ $doctor->doc_dept }}">{{ ucfirst($doctor->doc_dept) }}</option>
                                    <option value="surgery">Surgery</option>
                                    <option value="cardiologist">Cardiologist</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sex">Sex</label>
                                <select name="sex" id="sex" class="form-control" required>
                                    <option value="{{ $doctor->sex }}">{{ ucfirst($doctor->sex) }}</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="4" cols="5" required>{{ $doctor->address }}</textarea>
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