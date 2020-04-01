@extends('layouts.app')
@section('page-header-title', 'All Posts')
@section('page-current-position', 'Posts')
@section('pageTitle', 'All Posts')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Posts</h3>
            </div>
            <div class="card-body">
                <table id="posts-table" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ __($post->id) }}</td>
                                <td>{{ __($post->title) }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ $post->path() }}" target="_blank" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('posts.edit', __($post->id)) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a id="navbarDropdown" class="btn btn-danger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ __($post->id) }}').submit();">
                                                {{ __('Confirm Delete') }}
                                            </a>

                                            <form id="delete-form-{{ __($post->id) }}" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="_method" value="delete">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>

    </div>
@endsection
@section('script')
<script>
    $(function () {
        $("#posts-table").DataTable();
    });
</script>
@endsection
