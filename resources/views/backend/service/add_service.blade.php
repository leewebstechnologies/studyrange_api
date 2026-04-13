@extends('admin.master')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Service</h4>
            </div>
        </div>

        <!-- Form Validation -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Add Service</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('store.service') }}" method="post" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Service Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="col-md-6">
                                <label for="validationDefault01" class="form-label">Service Description</label>
                                <input type="text" name="desc" class="form-control">
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
