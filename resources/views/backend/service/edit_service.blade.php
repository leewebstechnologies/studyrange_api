@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Edit Service</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Edit Service</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('update.service') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $service->id }}">
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Service Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $service->title }}">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Service Description</label>
                                <input type="text" name="desc" class="form-control" value="{{ $service->desc }}">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="validationDefault01" class="form-label">Service Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                             <div class="col-md-6">
                                    <img id="showImage" src="{{ asset($service->image) }}" class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">
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

@endsection
