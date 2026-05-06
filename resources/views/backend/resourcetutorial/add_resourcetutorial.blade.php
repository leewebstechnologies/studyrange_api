@extends('admin.master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">Add Resource Tutorial</h4>
            </div>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">

                    <div class="card-header">
                        <h5 class="card-title mb-0">Upload Video</h5>
                    </div>

                    <div class="card-body">
                        <form id="myForm" action="{{ route('store.resourcetutorial') }}"
                              method="post"
                              class="row g-3"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 form-group">
                                <label class="form-label">Duration</label>
                                <input type="text" name="duration" class="form-control" placeholder="e.g. 10:45">
                            </div>

                            <div class="mb-3 form-group">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="mb-3 form-group">
                                <label class="form-label">Views</label>
                                <input type="text" name="views" class="form-control" placeholder="e.g. 15k Views">
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="form-label">Select Video</label>
                                <input type="file"
                                name="videoUrl"
                                class="form-control"
                                id="video"
                                accept="video/*"
                                required
                                />
                            </div>

                            <div class="col-md-6 form-group">
                                <video id="showVideo"
                                       controls
                                       style="width: 100%; max-height: 250px; display: none;">
                                </video>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">
                                    Upload Video
                                </button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('#video').change(function (e) {
            let file = e.target.files[0];
            if (file) {
                let url = URL.createObjectURL(file);
                $('#showVideo').attr('src', url).show();
            }
        });
    });
</script>

<script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    duration: {
                        required : true,
                    },
                    title: {
                        required : true,
                    },
                    views: {
                        required : true,
                    },
                     videoUrl: {
                        required : true,
                    },

                },
                messages :{
                    title: {
                        required : 'Please Enter Title',
                    },
                    duration: {
                        required : 'Please Enter Duration',
                    },
                    views: {
                        required : 'Please Enter Views',
                    },
                    videoUrl: {
                        required : 'Please Select Video',
                    },

                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>

@endsection
