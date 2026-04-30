@extends('admin.master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Schools</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <a href="{{ route('add.school') }}" class="btn btn-primary">Add School</a>
                </ol>
            </div>
        </div>

        <!-- Datatables  -->
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Tagone</th>
                                <th>Tagtwo</th>
                                <th>Tagthree</th>
                                <th>Location</th>
                                <th>Tuition</th>
                                <th>Students</th>
                                <th>Acceptance Rate</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($school as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->tagone }}</td>
                                    <td>{{ $item->tagtwo }}</td>
                                    <td>{{ $item->tagthree }}</td>
                                    <td>{{ $item->location }}</td>
                                    <td>{{ $item->tuition }}</td>
                                    <td>{{ $item->students }}</td>
                                    <td>{{ $item->acceptRate }}</td>
                                    <td><img src="{{ asset($item->image) }}" alt="school" style="width: 70px; height: 40px;"></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                        <a href="{{ route('edit.school', $item->id) }}" class="btn btn-success btn-sm">
                                            Edit
                                        </a>

                                        <a href="{{ route('delete.school', $item->id) }}"
                                            class="btn btn-danger btn-sm"
                                            id="delete">
                                            Delete
                                        </a>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

@endsection
