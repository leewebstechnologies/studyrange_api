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
                        <form id="myForm" action="{{ route('update.resource', $resource->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $resource->id }}">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $resource->title }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Tag</label>
                                <input type="text" name="tag" class="form-control" value="{{ $resource->tag }}">
                            </div>
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Tag Color</label>
                                <input type="text" name="tagColor" class="form-control" value="{{ $resource->tagColor }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Read Time</label>
                                <input type="text" name="readTime" class="form-control" value="{{ $resource->readTime }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Resource Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div class="col-md-6">
                                    <img id="showImage" src="{{ asset($resource->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
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

@endsection
