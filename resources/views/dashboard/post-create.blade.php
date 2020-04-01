@extends('layouts.app')
@section('page-header-title', 'Add New')
@section('page-current-position', 'New')
@section('pageTitle', 'New Blog Post')
@section('content')
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">New Post</h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" value="{{ old('title') }}" name="title" placeholder="Add Title" type="text">
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
                                <input type="checkbox" name="is_publish" class="custom-control-input" checked id="visibility">
                                <label class="custom-control-label" for="visibility"><i class="fas fa-eye"></i> Visibility</label>

                                <p>
                                    <small>Note: Visibility mean people can see or not. If you want to post publically just switch it blue color</small>
                                </p>
                            </div>
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
                            @if(count($categories))
                                <select name="category" class="form-control" id="category-list">
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ __($category->id) }}">{{ __($category->title) }}</option>
                                    @endforeach
                                </select>
                            @endif
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
                            <div class="select2-purple">
                                @if(count($tags) > 0)
                                    <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select Tags"
                                            data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option value="{{ __($tag->id) }}">{{ __($tag->title) }}</option>
                                        @endforeach

                                    </select>
                                @endif
                            </div>
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
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="thumbnail" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(function() {
            $('.select2').select2()
            $('.textarea').summernote( {
                height: 500
            })
        });
    </script>
@endsection
