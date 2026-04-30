@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add School</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add School</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('store.school') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="validationDefault01" class="form-label">School Description</label>
                                <textarea class="form-control" name="description" placeholder="Required example textarea"></textarea>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Tag One</label>
                                <input type="text" name="tagone" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Tag Two</label>
                                <input type="text" name="tagtwo" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Tag Three</label>
                                <input type="text" name="tagthree" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Location</label>
                                <input type="text" name="location" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Tuition</label>
                                <input type="text" name="tuition" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Students</label>
                                <input type="text" name="students" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Acceptance Rate</label>
                                <input type="text" name="acceptRate" class="form-control">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">School Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div class="col-md-6">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
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
        });

         $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                description: {
                    required : true,
                },
                tagone: {
                    required : true,
                },
                tagtwo: {
                    required : true,
                },
                tagthree: {
                    required : true,
                },
                location: {
                    required : true,
                },
                tuition: {
                    required : true,
                },
                students: {
                    required : true,
                },
                acceptRate: {
                    required : true,
                },

                image: {
                    required : true,
                },

            },
            messages :{
                name: {
                    required : 'Please Enter School Name',
                },

                description: {
                    required : 'Please Enter School Description',
                },

                tagone: {
                    required : 'Please Enter School Tag One',
                },

                tagtwo: {
                    required : 'Please Enter School Tag Two',
                },

                tagthree: {
                    required : 'Please Enter School Tag Three',
                },

                location: {
                    required : 'Please Enter School Location',
                },

                tuition: {
                    required : 'Please Enter School Tuition',
                },

                students: {
                    required : 'Please Enter School Students',
                },

                acceptRate: {
                    required : 'Please Enter School Acceptance Rate',
                },

                image: {
                    required : 'Please Upload School Image',
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
