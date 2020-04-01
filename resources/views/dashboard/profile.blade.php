@extends('layouts.app')
@section('pageTitle', 'UserProfile')
@section('page-header-title', 'UserProfile')
@section('page-current-position', 'Profile')
@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{ Auth::user()->image != null ? asset('/storage/img/' . Auth::user()->image ) : asset('img/avatar.png') }}" alt="">
                    </div>
                    <h3 class="profile-username text-center">{{ __(Auth::user()->name) }}</h3>
                    <p class="text-muted text-center">{{ __('Administrator') }}</p>
                    <strong><i class="fas fa-envelope"></i> Email</strong>
                    <p class="text-muted">{{ __(Auth::user()->email) }}</p>
                    <strong><i class="fas fa-check-square"></i> Verified Date</strong>
                    <p class="text-muted">{{ Auth::user()->email_verified_at }}</p>
                    <strong><i class="fas fa-calendar-day"></i> Joined Date</strong>
                    <p class="text-muted">{{ Auth::user()->created_at }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Change Your Password</h3>
                </div>
                <form action="{{ url('/admin/profile/'. Auth::user()->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="old_pass">Old Password</label>
                            <input type="password" class="form-control" id="old_pass" name="old_pass">
                        </div>
                        <div class="form-group">
                            <label for="new_pass">New Password</label>
                            <input type="password" class="form-control" id="new_pass" name="password">
                        </div>
                        <div class="form-group">
                            <label for="c_pass">Confirm Password</label>
                            <input  type="password" class="form-control" id="c_pass" name="password_confirmation">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i> Change Password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <form action="{{ url('/admin/profile/' . Auth::user()->id ) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="text-center">
                            <label role="button" class="text-center">
                                <img src="{{ Auth::user()->image != null ? asset('/storage/img/'. Auth::user()->image) : asset('img/avatar.png') }}" class="profile-user-img img-fluid img-circle" alt="">
                                <input style="visibility: hidden" class="form-control" name="image" type="file" accept="image/*">
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="uname">UserName</label>
                            <input class="form-control" value="{{ Auth::user()->name }}" id="uname" name="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{ Auth::user()->email }}" id="email" name="email">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary float-right" type="submit">
                            <i class="fas fa-check"></i> Confirm Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
