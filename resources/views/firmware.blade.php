@extends('layouts.master')
@section('pageTitle', 'All Firmwares')
@section('meta-title', 'All Firmwares Download List')
@section('meta-description', 'Download All Firmwares')
@section('content')
    <section class="mt-3">
        <div class="container p-0">
            <div class="row p-4">
                <div class="col-md-8 col-sm-12">

                    @if(count($firmwares) > 0)
                    <div class="card-header border-bottom-red-5px mb-4 font-weight-bold mb-5">
                        Files
                    </div>
                        @foreach($firmwares as $file)
                            <article class="mt-4 mb-4">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <a class="img-container" href="{{ $file->path() }}">
                                            <img class="img-fluid" src="{{ $file->thumbnail != 'noimage.png' ? '/storage/img/'.$file->thumbnail : asset('/storage/img/'.$default->default_thumbnail) }}" alt="{{ $file->title }}">
                                        </a>                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="card-title bg-white border-bottom">
                                            <a class="card-link text-dark font-weight-bold" href="{{ $file->path() }}">{{ __($file->title) }}</a>
                                        </div>

                                        <div class="card-text">
                                            {!! $file->description !!}
                                        </div>

                                    </div>
                                </div>
                            </article>
                            <hr>
                        @endforeach
                    @endif

                    <div class="mb-5">
                        {{ $firmwares->links() }}
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
