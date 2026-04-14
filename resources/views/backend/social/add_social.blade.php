@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Social Media</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Social Media</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('store.social') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Social Media Facebook</label>
                                <input type="text" name="facebook" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Social Media X</label>
                                <input type="text" name="x" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Social Media Instagram</label>
                                <input type="text" name="instagram" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Social Media Linkedin</label>
                                <input type="text" name="linkedin" class="form-control">
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    facebook: {
                        required : true,
                    },
                    x: {
                        required : true,
                    },
                    instagram: {
                        required : true,
                    },
                    linkedin: {
                        required : true,
                    },

                },
                messages :{
                    facebook: {
                        required : 'Please Enter Facebook URL',
                    },
                    x: {
                        required : 'Please Enter X URL',
                    },
                    instagram: {
                        required : 'Please Enter Instagram URL',
                    },
                    linkedin: {
                        required : 'Please Enter Linkedin URL',
                    },

                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

@endsection
