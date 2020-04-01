@extends('layouts.app')
@section('pageTitle', 'Edit Tag')
@section('page-header-title', 'Tags')
@section('page-current-position', 'Tags')
@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <form action="{{ route('tags.update', $tag->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card card-dark shadow-sm">
                    <div class="card-header">
                        <h4 class="card-title">Edit Tag</h4>
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
                            <input type="text" placeholder="Add Tag Title" value="{{ $tag->title }}" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Add Tag Description" style="min-height: 100px;">{{ $tag->description }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fas fa-check"></i> Confirm Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection




