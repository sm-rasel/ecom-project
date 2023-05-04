@extends('layout.admin.master')

@section('title')
    Slider Section
@endsection

@section('main_content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Hero Area</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Hero Area</a></li>
                        <li class="breadcrumb-item active">Slider Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-3 mb-md-5">Slider Section
                        <button class="btn btn-sm btn-outline-success w-md float-end" onclick="window.location.href='{{route('admin.slider_add')}}'">
                            <span class="font-size-12">
                                <i class="fas fa-plus"></i>
                                Create new
                            </span>
                        </button>
                    </h4>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>

                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
