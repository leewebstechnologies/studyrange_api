@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add About</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add About</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('store.about') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">About Title</label>
                               <textarea name="title" class="form-control" rows="3" placeholder="Enter About Title" required></textarea>
                            </div>

                            <div class="col-md-12>
                                <label for="validationDefault01" class="form-label">About Story</label>
                                <div id="quill-editor" style="height: 200px;" class="form-group"></div>
                                <input type="hidden" name="story" id="story" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">About Image</label>
                                <input type="file" name="image" class="form-control" id="image" required>
                            </div>

                            <div class="col-md-6 form-group">
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
            $('#story').val(text.length === 0 ? '' : quill.root.innerHTML);
            // Trigger validate on the hidden input if the form is already showing errors
            if ($('#story').hasClass('is-invalid') || $('#story').siblings('.invalid-feedback').length > 0 || $('#story').closest('.form-group').find('.invalid-feedback').length > 0) {
                $('#story').valid();
            }
        });

        // On form submission, update the hidden input value with the editor content
        $('#myForm').on('submit', function() {
            var text = quill.getText().trim();
            document.getElementById('story').value = text.length === 0 ? '' : quill.root.innerHTML;
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
                 story: {
                    required : true,
                },
                 image: {
                    required : true,
                },

            },
            messages :{
                title: {
                    required : 'Please Enter Title',
                },
                story: {
                    required : 'Please Enter Story',
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
