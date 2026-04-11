@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Contact One</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Contact One</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('store.contactone') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Call</label>
                                <input type="text" name="call" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">WhatsApp</label>
                                <input type="text" name="whatsapp" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Hours</label>
                                <input type="text" name="hours" class="form-control">
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
