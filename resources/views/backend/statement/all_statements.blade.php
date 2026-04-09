@extends('admin.master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Statements</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0">
                    <a href="{{ route('add.statement') }}" class="btn btn-primary">Add Statement</a>
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
                                <th>Mission</th>
                                <th>Vision</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($statement as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->mission }}</td>
                                    <td>{{ $item->vision }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                        <a href="{{ route('edit.statement', $item->id) }}" class="btn btn-success btn-sm">
                                            Edit
                                        </a>

                                        <a href="{{ route('delete.statement', $item->id) }}"
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
