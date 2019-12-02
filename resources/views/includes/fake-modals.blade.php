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
                <form class="form-horizontal  style-form" method="post" action="{{ url('/doctors/post') }}" id="addDoctorForm">
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
                    </div>
                    <div class="form-group">
                        <label for="department" class="control-label col-md-3">
                            <span class="pull-right">Department</span>
                        </label>
                        <div class="col-md-7">
                            <select class="form-control" id="department" name="department">
                                <option value="">Select Department</option>
                                <option value="surgery">Surgery</option>
                                <option value="cardiologist">Cardiologist</option>
                            </select>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" />
                </form>
            </div>
            <div class="modal-footer" align="center">
                <a class="btn btn-primary" style="width: 100%;" id="doctorSubmit">
                    Add Doctor
                    <i class="fa fa-check"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>

<!-- Add DOCTOR -->
<script>
    jQuery(document).ready(function(){
        jQuery('#doctorSubmit').click(function(e){

            $('#response').css('display', 'block');

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "{{ url('/doctors/post') }}",
                method: 'post',
                data: {
                    fullname: jQuery('#fullname').val(),
                    email: jQuery('#email').val(),
                    address: jQuery('#address').val(),
                    phone: jQuery('#phone').val(),
                    department: jQuery('#department').val()
                },
                cache: false,
                success: function(result){
                    $('#response').css('display', 'none');

                    if (jQuery('.alert-success').html(result.success).is(':empty')) {
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').html(result.error);
                    } else {
                        jQuery('.alert-success').show();
                        jQuery('.alert-success').html(result.success);
                        $('#addDoctorForm').css('display', 'none');
                    }

                }

            });
        });
    });
</script>