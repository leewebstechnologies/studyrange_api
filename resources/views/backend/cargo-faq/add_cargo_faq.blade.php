@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Cargo FAQ</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Cargo FAQ</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('store.cargo_faq') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                           <div class="col-md-6 form-group">
                                <label class="form-label">Question</label>
                                <div id="question-editor" style="height: 200px;"></div>
                                <input type="hidden" name="question" id="question">
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="form-label">Answer</label>
                                <div id="answer-editor" style="height: 200px;"></div>
                                <input type="hidden" name="answer" id="answer">
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
        // Initialize both editors
        var questionQuill = new Quill('#question-editor', {
            theme: 'snow'
        });

        var answerQuill = new Quill('#answer-editor', {
            theme: 'snow'
        });

        // On submit, assign values separately
        document.getElementById('myForm').onsubmit = function() {
            document.getElementById('question').value = questionQuill.root.innerHTML;
            document.getElementById('answer').value = answerQuill.root.innerHTML;
        };
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
                    question: {
                        required: true,
                    },
                    answer: {
                        required: true,
                    },
                },

                messages: {
                    question: {
                        required: 'Please Enter Question',
                    },
                    answer: {
                        required: 'Please Enter Answer',
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
