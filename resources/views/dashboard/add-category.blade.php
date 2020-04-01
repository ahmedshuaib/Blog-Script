@extends('layouts.app')
@section('pageTitle', 'Category')
@section('page-header-title', 'Category')
@section('page-current-position', 'Categories')
@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="card card-dark shadow-sm">
                    <div class="card-header">
                        <h4 class="card-title">Add Category</h4>
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
                            <input type="text" placeholder="Add Category Title" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <textarea style="min-height: 100px;" class="form-control" name="description" placeholder="Add Category Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category_">Parent Category</label>
                            @if(count($categories) > 0)
                                <select name="parent_id" class="form-control" id="category-list">
                                    <option>None</option>
                                    @foreach($categories as $category)
                                        <option value="{{ __($category->id) }}" {{ $category->id == $category->parent_id ? 'selected' : '' }}>{{ __($category->title) }}</option>
                                    @endforeach
                                </select>
                            @endif

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h4 class="card-title">All Category</h4>
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
                    <table id="cate-table" class="table table-hover table-striped">
                        <thead>
                        <tr>
                            {{-- <th>Id</th> --}}
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($categories) > 0)
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ __($category->title) }}</td>
                                    <td>{{ __($category->description) }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('category.edit', __($category->id)) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            <a id="navbarDropdown" class="btn btn-danger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <i class="fas fa-trash"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                    document.getElementById('delete-form-{{ __($category->id) }}').submit();">
                                                    {{ __('Confirm Delete') }}
                                                </a>

                                                <form id="delete-form-{{ __($category->id) }}" action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @endif

                    </table>
                </div>
            </div>
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




