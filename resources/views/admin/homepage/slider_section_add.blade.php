@extends('layout.admin.master')
@section('title')
    Slider add
@endsection

@section('main_content')
    <!-- start page title -->
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Slider Section</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Page Settings</a></li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Add Slider Form</h4>
                <form action="{{route('admin.slider_store')}}" method="POST" id="sliderForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Slider Description
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <textarea class="form-control summernote" name="slider_description" id="sliderDescription" placeholder="Enter Your Description"></textarea>
                            @if($errors->has('slider_description'))
                                <span class="error" id="sliderDescriptionError">{{ $errors->first('slider_description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Button Url
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="url" name="button_url" id="buttonUrl" class="form-control" placeholder="Enter Your Url"/>
                            <span class="error" id="buttonUrlError">{{$errors->has('button_url') ? $errors->first('button_url') : ' ' }}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">
                            Slider Image
                            <span class="text-danger me-1">*</span>
                        </label>
                        <div class="col-sm-9">
                            <input type="file" name="slider_image" id="sliderImage" onchange="loadFile(event)" class="form-control"/>
                            <img class="mt-3 w-25" src="" id="output" alt="">
                            @if($errors->has('slider_image'))
                                <span class="error" id="sliderImageError">{{ $errors->first('slider_image') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-outline-success w-md px-5 me-1" id="sliderBtn">Create New Slider</button>
                            <button type="reset" class="btn btn-outline-danger w-md px-3">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
@endsection
