@extends('layouts.app')
@section('page-header-title', 'Add New')
@section('page-current-position', 'New')
@section('pageTitle', 'New Firmware')
@section('content')
    <form action="{{ route('firmware.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">New Firmware</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" placeholder="Add Title" value="{{ old('title') }}" type="text">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" style="height: 85px" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" class="textarea form-control" id="post-body" cols="30" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Publish</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="is_publish" checked id="visibility">
                                <label class="custom-control-label" for="visibility"><i class="fas fa-eye"></i> Visibility</label>
                                <p>
                                    <small>Note: Visibility mean people can see or not. If you want to post publically just switch it blue color</small>
                                </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dl_link">Download Link</label>
                            <input class="form-control" value="{{ old('download_link') }}" placeholder="Enter Download Link" id="dl_link" name="download_link">
                        </div>
                        <div class="form-group">
                            <label for="size_of_file">File Size</label>
                            <input type="number" value="{{ old('file_size') }}" step="0.01" minlength="0.0" class="form-control" placeholder="Enter File Size" name="file_size">
                        </div>
                        <div class="form-group">
                            <label for="data_type">File Size Type</label>
                            <select class="form-control" name="data-type">
                                <option value="BYTE">BYTES</option>
                                <option value="KB">KB</option>
                                <option value="MB">MB</option>
                                <option value="GB" selected>GB</option>
                                <option value="TB">TB</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm float-right btn-success">Publish</button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><h4 class="card-title">Categories</h4></h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category_">Select Category</label>
                            @include('dashboard.inc.select.category-component')
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tags</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tags</label>
                            @include('dashboard.inc.select.tag-component')
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Thumbnail</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('dashboard.inc.file.image-upload')
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@include('dashboard.inc.select.select-js')
