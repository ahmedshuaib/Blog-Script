@extends('layouts.app')
@section('pageTitle', 'Welcome to Dashboard')
@section('content')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

            <div class="info-box-content">
                <a href="{{ route('category.index') }}">
                    <span class="info-box-text">Category</span>
                    <span class="info-box-number">
                    {{ count($categories) }}
                </span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-paper-plane"></i></span>

            <div class="info-box-content">
                <a href="{{ route('pages.index') }}">
                    <span class="info-box-text">Pages</span>
                    <span class="info-box-number">{{ count($pages) }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>

            <div class="info-box-content">
                <a href="{{ route('posts.index') }}">
                    <span class="info-box-text">Blog Posts</span>
                    <span class="info-box-number">{{ count($blog_posts) }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-file"></i></span>

            <div class="info-box-content">
                <a href="{{ route('firmware.index') }}">
                    <span class="info-box-text">Firmwares</span>
                    <span class="info-box-number">{{ __(count($firmware)) }}</span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recently Published Blog Posts</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    @if(count($blog_posts) > 0)
                        @foreach($blog_posts as $post)
                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ $post->thumbnail != 'noimage.png' ? asset('/storage/img/' . $post->thumbnail) : '' }}" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">{{ __($post->title) }}</a>
                                    <div class="product-description">
                                        @if(count($post->tags()->pluck('title')) > 0)
                                            @foreach($post->tags->pluck('title') as $title)
                                                <span class="badge badge-warning badge-pill">{{ __($title) }}</span>
                                            @endforeach
                                        @endif
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recently Published Firmware</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">

                    @if(count($firmware) > 0)
                        @foreach($firmware as $post)

                            <li class="item">
                                <div class="product-img">
                                    <img src="{{ $post->thumbnail != 'noimage.png' ? asset('/storage/img/'. $post->thumbnail) :  asset('img/thumbnail.png') }}" alt="Product Image" class="img-size-50">
                                </div>
                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">
                                        {{ $post->title }}
                                        @if(count($post->tags()->pluck('title')) > 0)
                                        @foreach ($post->tags()->pluck('title') as $title)
                                            <span class="badge badge-warning float-right">{{ __($title) }}</span>
                                        @endforeach
                                        @endif
                                    </a>
                                    <span class="product-description">
                                        {{ $post->description }}
                                    </span>
                                </div>
                            </li>

                            @if($loop->iteration == 5)
                                @break
                            @endif
                        @endforeach
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
