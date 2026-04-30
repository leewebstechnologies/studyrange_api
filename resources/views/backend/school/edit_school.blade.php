@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit School</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit School</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('update.school') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $school->id }}">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $school->name }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Description</label>
                                <input type="text" name="description" class="form-control" value="{{ $school->description }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Tagone</label>
                                <input type="text" name="tagone" class="form-control" value="{{ $school->tagone }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Tagtwo</label>
                                <input type="text" name="tagtwo" class="form-control" value="{{ $school->tagtwo }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Tagthree</label>
                                <input type="text" name="tagthree" class="form-control" value="{{ $school->tagthree }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Location</label>
                                <input type="text" name="location" class="form-control" value="{{ $school->location }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Tuition</label>
                                <input type="text" name="tuition" class="form-control" value="{{ $school->tuition }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Students</label>
                                <input type="text" name="students" class="form-control" value="{{ $school->students }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Acceptance Rate</label>
                                <input type="text" name="acceptRate" class="form-control" value="{{ $school->acceptRate }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">School Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div class="col-md-6">
                                    <img id="showImage" src="{{ asset($school->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
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
