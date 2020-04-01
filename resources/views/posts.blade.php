@extends('layouts.master')
@section('pageTitle', 'All Posts')
@section('meta-title', 'All Blog Posts')
@section('meta-description', 'My all youtube posts')
@section('content')
    <section class="mt-3">
        <div class="container p-0">
            <div class="row p-4">
                <div class="col-md-8 col-sm-12">
                    @if(count($posts) > 0)
                        <div class="card-header border-bottom-red-5px mb-4 font-weight-bold mb-5">
                            Posts
                        </div>
                        @foreach($posts as $post)
                            <article class="mt-4 mb-4">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <img class="img-fluid" src="{{ $post->thumbnail != 'noimage.png' ? asset('/storage/img/'.$post->thumbnail) : asset('/storage/img/'.$default->default_thumbnail) }}" alt="{{ $post->title }}">
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="card-title bg-white border-bottom">
                                            <a class="card-link text-dark font-weight-bold" href="{{ $post->path() }}">
                                                {{ __($post->title) }}
                                            </a>
                                        </div>
                                        <div class="card-comments">
                                            @if(count($post->tags()->pluck('title')) > 0)
                                                @foreach($post->tags()->pluck('title') as $tag)
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
                    @endif

                    <div class="mb-5">
                        {{ $posts->links() }}
                    </div>

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
