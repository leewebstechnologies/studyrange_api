@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit About</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit About</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('update.about') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $about->id }}">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">About Title</label>
                                <textarea name="title" class="form-control" rows="3">{{ $about->title }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="validationDefault01" class="form-label">About Story</label>
                                    <div>
                                        <div id="quill-editor" style="height: 200px;"></div>
                                        <input type="hidden" name="story" id="story">
                                        <div id="quill-content" style="display: none;">
                                            {!! $about->story !!}
                                        </div>
                                    </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">About Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div class="col-md-6">
                                    <img id="showImage" src="{{ asset($about->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
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
        var quill = new Quill('#quill-editor', {
            theme: 'snow'
        });

        // Load existing content
        var initialContent = document.getElementById('quill-content').innerHTML;
        if (initialContent) {
            quill.clipboard.dangerouslyPasteHTML(initialContent);
        }

        // Submit
        document.getElementById('myForm').onsubmit = function() {
            document.getElementById('story').value = quill.root.innerHTML;
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
