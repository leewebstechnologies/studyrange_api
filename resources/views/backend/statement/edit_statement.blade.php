@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Edit Statement</h4>
                            </div>
                        </div>

                        <!-- Form Validation -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Edit Statement</h5>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <form id="myForm" action="{{ route('update.statement') }}" method="post" class="row g-3" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $statement->id }}">
                                            <div class="col-md-12">
                                                <label class="form-label">Statement Mission</label>
                                                <div id="mission-editor" style="height: 200px;"></div>
                                                <input type="hidden" name="mission" id="mission">
                                                <div id="mission-content" style="display:none;">
                                                    {!! $statement->mission !!}
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Statement Vision</label>
                                                <div id="vision-editor" style="height: 200px;"></div>
                                                <input type="hidden" name="vision" id="vision">
                                                <div id="vision-content" style="display:none;">
                                                    {!! $statement->vision !!}
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

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

        // Load existing Mission content
        var missionContent = document.getElementById('mission-content').innerHTML;
        if (missionContent) {
            missionQuill.clipboard.dangerouslyPasteHTML(missionContent);
        }

        // Load existing Vision content
        var visionContent = document.getElementById('vision-content').innerHTML;
        if (visionContent) {
            visionQuill.clipboard.dangerouslyPasteHTML(visionContent);
        }

        // Submit both values correctly
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
