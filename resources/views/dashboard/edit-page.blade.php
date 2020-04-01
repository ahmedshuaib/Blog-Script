@extends('layouts.app')
@section('page-header-title', 'Page Editor')
@section('page-current-position', 'Pages')
@section('pageTitle', 'Edit Page')
@section('content')
    <form action="{{ route('pages.update', $page->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Page</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="form-control" name="title" value="{{ __($page->title) }}">
                        </div>

                        <div class="form-group">
                            <label for="slug">Page Slug</label>
                            <input type="text" id="slug" class="form-control" name="slug" value="{{ __($page->slug) }}">
                        </div>

                        <div class="form-group">
                            <label for="desc">Description</label>
                            <input type="text" id="desc" class="form-control" name="description" value="{{ __($page->description) }}">
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea class="form-control page-edit" name="body" id="body" cols="30" rows="10">{{ __($page->body) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_method" value="PUT">
            {{-- submit button--}}
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Publish</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="is_publish" class="custom-control-input" checked id="visibility">
                                <label class="custom-control-label" for="visibility"><i class="fas fa-eye"></i> Visibility</label>

                                <p>
                                    <small>Note: Visibility mean people can see or not. If you want to post publically just switch it blue color</small>
                                </p>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-check"></i> Confirm Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(function() {
            $('.page-edit').summernote( {
                height: 300
            });
        });
    </script>
@endsection
