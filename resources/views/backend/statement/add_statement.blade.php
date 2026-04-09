@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Statement</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Statement</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('store.statement') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                           <div class="col-md-6">
                                <label class="form-label">Mission</label>
                                <div id="mission-editor" style="height: 200px;"></div>
                                <input type="hidden" name="mission" id="mission">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Vision</label>
                                <div id="vision-editor" style="height: 200px;"></div>
                                <input type="hidden" name="vision" id="vision">
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
        var missionQuill = new Quill('#mission-editor', {
            theme: 'snow'
        });

        var visionQuill = new Quill('#vision-editor', {
            theme: 'snow'
        });

        // On submit, assign values separately
        document.getElementById('myForm').onsubmit = function() {
            document.getElementById('mission').value = missionQuill.root.innerHTML;
            document.getElementById('vision').value = visionQuill.root.innerHTML;
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

@endsection
