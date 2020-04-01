@extends('layouts.app')
@section('pageTitle', 'Tag')
@section('page-header-title', 'Tags')
@section('page-current-position', 'Tags')
@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
            <form action="{{ route('tags.store') }}" method="post">
                @csrf
                <div class="card card-dark shadow-sm">
                    <div class="card-header">
                        <h4 class="card-title">Add Tag</h4>
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
                            <input type="text" placeholder="Add Tag Title" class="form-control @error('title') is-invalid @enderror" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Add Tag Description" style="min-height: 100px;"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i> Save Tag</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h4 class="card-title">All Tags</h4>
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
                            <th>Id</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($tags) > 0)
                            @foreach($tags as $tag)
                                <tr>
                                    <td>{{ __($tag->id) }}</td>
                                    <td>{{ __($tag->title) }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('tags.edit', __($tag->id)) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            <a id="navbarDropdown" class="btn btn-danger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <i class="fas fa-trash"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                    document.getElementById('delete-form-{{ __($tag->id) }}').submit();">
                                                    {{ __('Confirm Delete') }}
                                                </a>

                                                <form id="delete-form-{{ __($tag->id) }}" action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: none;">
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




