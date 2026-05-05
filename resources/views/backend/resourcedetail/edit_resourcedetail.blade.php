@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Platform Stat</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Resource</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('update.resourcedetail') }}" method="post" class="row g-3">
                            @csrf
                            <input type="hidden" name="id" value="{{ $resourcedetail->id }}">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $resourcedetail->title }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Tag</label>
                                <input type="text" name="tag" class="form-control" value="{{ $resourcedetail->tag }}">
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Tag Color</label>
                                <input type="text" name="tagColor" class="form-control" value="{{ $resourcedetail->tagColor }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Read Time</label>
                                <input type="text" name="readTime" class="form-control" value="{{ $resourcedetail->readTime }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Author</label>
                                <input type="text" name="author" class="form-control" value="{{ $resourcedetail->author }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Role</label>
                                <input type="text" name="role" class="form-control" value="{{ $resourcedetail->role }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Date</label>
                                <input type="text" name="date" class="form-control" value="{{ $resourcedetail->date }}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Resource Content</label>
                                <div id="quill-editor" style="height: 200px;" class="form-group"></div>
                                <input type="hidden" name="content" id="content">
                                <div id="resource-content" style="display:none;">
                                    {!! $resourcedetail->content !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div class="col-md-6">
                                    <img id="showImage" src="{{ asset($resourcedetail->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
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
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script>
        $(document).ready(function() {
            var quill = new Quill('#quill-editor', {
                theme: 'snow'
            });

            // Load existing content
            var existingContent = $('#resource-content').html();
            quill.clipboard.dangerouslyPasteHTML(existingContent);
            $('#content').val(quill.root.innerHTML);

            quill.on('text-change', function() {
                var text = quill.getText().trim();
                $('#content').val(text.length === 0 ? '' : quill.root.innerHTML);
            });

            $('#myForm').on('submit', function() {
                var text = quill.getText().trim();
                document.getElementById('content').value = text.length === 0 ? '' : quill.root.innerHTML;
            });
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

@endsection
