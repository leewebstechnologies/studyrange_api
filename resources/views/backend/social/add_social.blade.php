@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Social Media</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Social Media</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('store.social') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Social Media Facebook</label>
                                <input type="text" name="facebook" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Social Media X</label>
                                <input type="text" name="x" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Social Media Instagram</label>
                                <input type="text" name="instagram" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Social Media Linkedin</label>
                                <input type="text" name="linkedin" class="form-control">
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
