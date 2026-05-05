@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Resource Detail</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Resource Detail</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('store.resourcedetail') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Resource Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Resource Title">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Resource Tag</label>
                                <input type="text" name="tag" class="form-control" placeholder="Enter Resource Tag">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Resource Tag Color</label>
                                <input type="text" name="tagColor" class="form-control" placeholder="Enter Resource Tag Color">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Resource Read Time</label>
                                <input type="text" name="readTime" class="form-control" placeholder="Enter Resource Read Time">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Resource Author</label>
                                <input type="text" name="author" class="form-control" placeholder="Enter Resource Author">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Resource Role</label>
                                <input type="text" name="role" class="form-control" placeholder="Enter Resource Role">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Resource Date</label>
                                <input type="text" name="date" class="form-control" placeholder="Enter Resource Date">
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="validationDefault01" class="form-label">Resource Content</label>
                                <div id="quill-editor" style="height: 200px;" class="form-group"></div>
                                <input type="hidden" name="content" id="content">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Resource Image</label>
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


     <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <!-- Include Quill JavaScript -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        // Initialize Quill editor
        var quill = new Quill('#quill-editor', {
            theme: 'snow'
        });

        quill.on('text-change', function() {
            var text = quill.getText().trim();
            $('#content').val(text.length === 0 ? '' : quill.root.innerHTML);
            // Trigger validate on the hidden input if the form is already showing errors
            if ($('#content').hasClass('is-invalid') || $('#content').siblings('.invalid-feedback').length > 0 || $('#content').closest('.form-group').find('.invalid-feedback').length > 0) {
                $('#content').valid();
            }
        });

        // On form submission, update the hidden input value with the editor content
        $('#myForm').on('submit', function() {
            var text = quill.getText().trim();
            document.getElementById('content').value = text.length === 0 ? '' : quill.root.innerHTML;
        });
    </script>


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
                title: {
                    required : true,
                },
                 tag: {
                    required : true,
                },
                 tagColor: {
                    required : true,
                },
                readTime: {
                    required : true,
                },
                author: {
                    required : true,
                },
                role: {
                    required : true,
                },
                date: {
                    required : true,
                },
                content: {
                required : true,
                },
                 image: {
                    required : true,
                },

            messages :{
                title: {
                    required : 'Please Enter Title',
                },
                tag: {
                    required : 'Please Enter Tag',
                },
                tagColor: {
                    required : 'Please Enter Tag Color',
                },
                readTime: {
                    required : 'Please Enter Read Time',
                },
                author: {
                    required : 'Please Enter Author',
                },
                role: {
                    required : 'Please Enter Role',
                },
                date: {
                    required : 'Please Enter Date',
                },
                content: {
                    required : 'Please Enter Content',
                },
                image: {
                    required : 'Please Upload Image',
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
