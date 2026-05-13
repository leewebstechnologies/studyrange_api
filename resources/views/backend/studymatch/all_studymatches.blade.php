@extends('admin.master')
@section('admin')

<div class="content">

    <!-- Start Content-->
    <div class="container-xxl">

        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-18 fw-semibold m-0">All Study Matches</h4>
            </div>

            <div class="text-end">
                <ol class="breadcrumb m-0 py-0"></ol>
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
                                <th>Study Level</th>
                                <th>Subject Area</th>
                                <th>Budget Range</th>
                                <th>Academic Score</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($studymatch as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->studyLevel }}</td>
                                    <td>{{ $item->subjectArea }}</td>
                                    <td>{{ $item->budgetRange }}</td>
                                    <td>{{ $item->academicScore }}</td>
                                    <td>
                                        <a href="{{ route('delete.studymatch', $item->id) }}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->

</div> <!-- content -->

@endsection
