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
                                <th class="text-center">Sl</th>
                                <th class="text-center">Order</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($sliders as $slider)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $slider->slider_order }}</td>
                                <td class="text-center">{!! Str::words(strip_tags($slider->slider_description), 5) !!}</td>
                                <td class="text-center">
                                    <img src="{{ asset($slider->slider_image) }}" class="admin-center-img" alt="">
                                </td>
                                <td class="text-center">
                                    @if($slider->status == 1)
                                        <span class="badge rounded-pill badge-soft-success">Active</span>
                                    @else
                                        <span class="badge rounded-pill badge-soft-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-sm btn-outline-success" title="Show Slider Section">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-primary" title="Edit Slider Section" onclick="window.location.href='{{ route('admin.slider_edit', ['id' => $slider->id]) }}'">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-warning" data-id="{{ $slider->id }}" data-action="{{ route('admin.slider_status_update', ['id' => $slider->id]) }}" onclick="updateSliderStatus({{$slider->id}})" title="Active Status">
                                        @if($slider->status == 1)
                                            <i class="fas fa-check"></i>
                                        @else
                                            <i class="fas fa-times"></i>
                                        @endif
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" {{ $slider->status == 1 ? 'disabled': '' }} data-id="{{ $slider->id }}" data-action="{{ route('admin.slider_status_update', ['id' => $slider->id]) }}" onclick="deleteSliderSection({{ $slider->id }})" title="Delete Section">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
