@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Hero</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Hero</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('update.hero') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $hero->id }}">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Hero Client</label>
                                <input type="text" name="client" class="form-control" value="{{ $hero->client }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Hero Rating</label>
                                <input type="text" name="rating" class="form-control" value="{{ $hero->rating }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Hero Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $hero->phone }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Hero Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                            </div>

                            <div class="col-md-6">
                                    <img id="showImage" src="{{ asset($hero->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
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
