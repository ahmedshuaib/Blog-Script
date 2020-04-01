@extends('layouts.master')
@section('pageTitle', $cat)
@section('content')
    <section class="mt-3">
        <div class="container p-0">

            <div class="row p-4">
                <div class="col-md-8 col-sm-12">

                    @if(count($files) > 0)
                        <div class="card-header shadow rounded-0 bg-success text-white mb-4 font-weight-bold">
                            Files
                        </div>
                        @foreach($files as $file)
                            <article class="mt-4 mb-4">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <img class="img-fluid" src="{{ $file->thumbnail != 'noimage.png' ? asset('/storage/img/'.$file->thumbnail) : asset('img/thumbnail.png') }}" alt="{{ $file->title }}">
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="card-title bg-white border-bottom">
                                            <a class="card-link text-dark font-weight-bold" href="{{ $file->path() }}">
                                                {{ __($file->title) }}
                                            </a>
                                        </div>
                                        <div class="card-comments">
                                            @if(count($file->tags()->pluck('title')) > 0)
                                                @foreach($file->tags()->pluck('title') as $tag)
                                                    <span class="badge badge-pill badge-primary">
                                                        {{ __($tag) }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </article>
                            <hr>
                        @endforeach
                        <div class="mb-5">
                            {{ $files->links() }}
                        </div>
                    @endif



                    @if(count($posts) > 0)
                        <div class="card-header shadow rounded-0 bg-success text-white mb-4 font-weight-bold">
                            Posts
                        </div>
                        @foreach($posts as $file)
                            <article class="mt-4 mb-4">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <img class="img-fluid" src="{{ $file->thumbnail != 'noimage.png' ? asset('/storage/img/'.$file->thumbnail) : asset('img/thumbnail.png') }}" alt="{{ $file->title }}">
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="card-title bg-white border-bottom">
                                            <a class="card-link text-dark font-weight-bold" href="{{ $file->path() }}">
                                                {{ __($file->title) }}
                                            </a>
                                        </div>
                                        <div class="card-comments">
                                            @if(count($file->tags()->pluck('title')) > 0)
                                                @foreach($file->tags()->pluck('title') as $tag)
                                                    <span class="badge badge-pill badge-primary">
                                                        {{ __($tag) }}
                                                    </span>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </article>
                            <hr>
                        @endforeach
                            {{ $posts->links() }}
                    @endif


                </div>

                @include('inc.right-sidebar')
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $(function() {
            $('.pagination').addClass(`justify-content-end`)
        });
    </script>
@endsection
