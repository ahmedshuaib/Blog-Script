@extends('layouts.app')
@section('pageTitle', 'Edit Category')
@section('page-header-title', 'Category')
@section('page-current-position', 'Categories')
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card card-dark shadow-sm">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
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
                            <input type="text" placeholder="Edit Category Title" class="form-control @error('title') is-invalid @enderror" name="title" id="title" autofocus value="{{ $category->title }}">
                        </div>
                        <div class="form-group">
                            <textarea style="min-height: 100px;" class="form-control" name="description" placeholder="Edit Category Description">{{$category->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">Parent Category</label>
                            @if(count($categories) > 0)
                                <select name="parent_id" class="form-control" id="parent_id">
                                    <option>None</option>
                                    @foreach($categories as $category)
                                         <option value="{{ $category->id }}" {{ ($category->parent_id == $category->id) ? 'selected' : '' }}> {{ $category->title }} </option>
                                        @if($category->parent_id != null)
                                            <option value="{{ __($category->id) }}">{{ __('--'.$category->title) }}</option>
                                            @continue
                                        @endif
                                        <option value="{{ __($category->id) }} {{ ($category->parent_id == $category->id) ? 'selected' : '' }}">{{ __($category->title) }}</option>
                                    @endforeach
                                </select>
                            @endif

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-right">Confirm update</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $("#cate-table").DataTable();
        });
    </script>
@endsection




