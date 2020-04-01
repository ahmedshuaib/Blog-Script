@extends('layouts.master')
@section('pageTitle', $post->title)
@section('meta-title', $post->title)
@section('meta-description', $post->title . ' #YouTube')
@section('content')
    <section class="mt-3">
        <div class="container p-0">
            <div class="row p-4">
                <div class="col-md-8 col-sm-12">
                    <div class="card bg-white border-0">
                        <h5 class="card-header rounded-0 bg-white border-bottom">
                                 {{ __($post->title) }}
                        </h5>
                        @if($post->thumbnail != 'noimage.png')
                            <img src="{{ asset('storage/img/' . $post->thumbnail) }}" class="img-thumbnail my-2 border-0 card-img-top" alt="{{ $post->title }}">
                        @endif
                        @if(count($post->tags()->pluck('title')) > 0)
                        <div class="card-header bg-gradient-blue">
                            @foreach($post->tags()->pluck('title') as $tag)
                                <span class="badge badge-primary badge-pill">{{ __($tag) }}</span>
                            @endforeach
                        </div>
                        @endif

                        <div class="card-body">
                            <div class="card-text">
                                {!! $post->body !!}
                            </div>
                        </div>
                    </div>
                </div>

                @include('inc.right-sidebar')
            </div>
        </div>
    </section>
@endsection
