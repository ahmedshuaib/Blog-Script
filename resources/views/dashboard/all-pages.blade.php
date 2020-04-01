@extends('layouts.app')
@section('page-header-title', 'Pages')
@section('page-current-position', 'Pages')
@section('pageTitle', 'All Pages')
@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Pages</h3>
            </div>
            <div class="card-body">
                <table id="page-table" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($pages) > 0)
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ __($page->id) }}</td>
                                <td>{{ __($page->title) }}</td>
                                <td>{{ __($page->description) }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('pages.show', $page->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a id="navbarDropdown" class="btn btn-danger dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="#" onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ __($page->id) }}').submit();">
                                                {{ __('Confirm Delete') }}
                                            </a>

                                            <form id="delete-form-{{ __($page->id) }}" action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display: none;">
                                                @csrf
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
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $("#page-table").DataTable();
        });
    </script>
@endsection
