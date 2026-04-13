@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Counselor</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Counselor</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('update.counselor', $counselor->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $counselor->id }}">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Counselor Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $counselor->name }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Counselor Section</label>
                                <input type="text" name="section" class="form-control" value="{{ $counselor->section }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Counselor Experience</label>
                                <input type="text" name="experience" class="form-control" value="{{ $counselor->experience }}">
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
