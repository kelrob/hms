@extends('Dashboard.template')

@section('wrapper')

    <section class="wrapper">

        <div class="row">
            <div class="col-lg-12 main-chart">

                <!-- Header Begin -->
                <div class="border-head">
                    <h3 style="text-transform: uppercase;">
                        <b><span style="" class="fa fa-medkit"></span>
                            Edit Prescription
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
                        <form method="post" action="{{ url('edit-prescription/'. $prescription->id) }}" id="edit-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="drug">Drug Name</label>
                                <input type="text" value="{{ $prescription->drug }}" name="drug" class="form-control" id="drug" required>
                            </div>

                            <div class="form-group">
                                <label for="interval">Intervals</label>
                                <select name="interval" class="form-control" id="interval" required>
                                    <option value="{{ $prescription->interval }}">{{ ucwords($prescription->interval) }}</option>
                                    <option value="once per day">Once Per Day (Mornings)</option>
                                    <option value="twice per day">Twice Per Day (Morning and Night)</option>
                                    <option value="thrice per day">Thrice Per Day (Morning, Noon and Night)</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="report">Report</label>
                                <textarea rows="4" name="report" cols="10" class="form-control" id="report" required>{{ $prescription->report }}</textarea>
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" class="btn btn-primary" value="Edit Prescription">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection