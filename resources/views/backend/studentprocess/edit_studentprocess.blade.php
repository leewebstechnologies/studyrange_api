@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Student Process</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Student Process</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('update.studentprocess') }}" method="post" class="row g-3">
                            @csrf
                            <input type="hidden" name="id" value="{{ $studentprocess->id }}">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Student Process Heading</label>
                                <input type="text" name="heading" class="form-control" value="{{ $studentprocess->heading }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Student Process Content</label>
                                <textarea name="content" class="form-control" rows="3">{{ $studentprocess->content }}</textarea>
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
