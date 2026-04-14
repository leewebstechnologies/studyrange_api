@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Contact One</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Contact One</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('store.contactone') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Call</label>
                                <input type="text" name="call" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">WhatsApp</label>
                                <input type="text" name="whatsapp" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Hours</label>
                                <input type="text" name="hours" class="form-control">
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
                    call: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    whatsapp: {
                        required: true,
                    },
                    hours: {
                        required: true,
                    },
                },

                messages: {
                    call: {
                        required: 'Please Enter Call',
                    },
                    email: {
                        required: 'Please Enter Email',
                    },
                    whatsapp: {
                        required: 'Please Enter WhatsApp',
                    },
                    hours: {
                        required: 'Please Enter Hours',
                    },
                },

                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element){
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element){
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

@endsection
