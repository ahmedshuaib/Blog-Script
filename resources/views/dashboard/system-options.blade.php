@extends('layouts.app')
@section('page-header-title', 'Options')
@section('page-current-position', 'Options')
@section('pageTitle', 'System Options')
@section('content')
    <div class="col-md-12">
        <div class="card">
        <form action="{{ route('options.update', $options->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#website" data-toggle="tab">WebSite</a></li>
                    <li class="nav-item"><a class="nav-link" href="#information" data-toggle="tab">Information</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="website">

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 text-right col-form-label">Website title</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="web_title" value="{{ $options->web_title }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 text-right col-form-label">Website URL</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="web_url" value="{{ $options->web_url }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 text-right col-form-label">Logo</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label role="button" >
                                    <img src="{{ $options->logo != 'logo.png' ? asset('/storage/img/'. $options->logo) : asset('img/defaultlogo.png') }}" class="img-logo-holder img-fluid" alt="">
                                    <input style="visibility: hidden" value="{{ $options->logo }}" class="form-control" name="logo" type="file" accept="image/*">
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 text-right col-form-label">Meta Description</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="meta_description" value="{{ $options->meta_description }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 text-right col-form-label">Meta Keywords</label>
                            <div class="col-md-8 col-sm-6 col-xs-12">
                                <input type="text" name="meta_keywords" value="{{ $options->meta_keywords }}" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 text-right col-form-label">Default Thumbnail</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label role="button" >
                                    <img src="{{ $options->default_thumbnail != 'thumbnail.png' ? asset('/storage/img/'. $options->default_thumbnail) : asset('img/thumbnail.png') }}" class="img-logo-holder img-fluid" alt="">
                                    <input style="visibility: hidden" class="form-control" value="{{ $options->default_thumbnail }}" name="default_thumbnail" type="file" accept="image/*">
                                </label>
                            </div>
                        </div>

                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="information">

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 col-form-label text-right">Technical Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="technical_email" value="{{ $options->technical_email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 col-form-label text-right">Support Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="support_email" value="{{ $options->support_email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 col-form-label text-right">Contact Email</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="contact_email" value="{{ $options->contact_email }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 col-form-label text-right">Phone Number</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="phone_number" value="{{ $options->phone_number }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 text-right col-form-label">Payment Company</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label role="button" >
                                    <img src="{{ $options->favicon_icon != 'favicon.ico' ? asset('/storage/img/'. $options->favicon_icon) : asset('img/bkash.png') }}" class="profile-user-img border-0 img-fluid img-circle" alt="{{ $options->favicon_icon }}">
                                    <input style="visibility: hidden" class="form-control" value="{{ $options->favicon_icon }}" name="favicon" type="file" accept="image/*">
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-sm-6 col-xs-12 col-form-label text-right">Payment Number</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" name="account_number" value="{{ $options->account_number }}">
                            </div>
                        </div>

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary text-right"><i class="fas fa-check"></i> Confirm Update</button>
            </div>
        </form>
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
@endsection
