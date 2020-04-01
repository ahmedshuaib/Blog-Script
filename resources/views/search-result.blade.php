@extends('layouts.master')
@section('pageTitle', $keyword)
@section('content')
    <section class="mt-3">
        <div class="container p-0">

            <div class="row p-4">
                <div class="col-md-8 col-sm-12">

                    <div class="row mb-5">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card border-0 rounded-0">
                                <h6 class="card-header border-bottom-red-5px">Posts Result</h6>
                                <div class="card-body text-center">
                                    <label class="font-weight-bold">
                                        @if(count($post_result) > 0)
                                        <h2>{{ 'Total Result: ' . count($post_result) }}</h2>
                                        @else
                                            <h1>😭😭😭😭😭</h1>
                                        @endif
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="card border-0 rounded-0">
                                <h6 class="card-header border-bottom-red-5px">Firmware Result</h6>
                                <div class="card-body text-center">
                                    <label class="font-weight-bold">
                                        @if(count($firmware_result) > 0)
                                            <h2> Firmware Result:
                                            {{ count($firmware_result) }} </h2>
                                        @else
                                            <h1>😭😭😭😭😭</h1>
                                        @endif

                                    </label>

                                </div>
                            </div>
                        </div>
                    </div>


                    @if(count($post_result) > 0)
                        <div class="card-header rounded-0 border-bottom-red-5px mb-4 font-weight-bold">
                            Posts
                        </div>
                        @foreach($post_result as $post)
                            <article class="mt-4 mb-4">
                                <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                        <div class="card-title bg-white">
                                            <a class="card-link text-dark font-weight-bold" href="{{ $post->path() }}">
                                                {{ __($post->title) }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <hr>
                        @endforeach
                    @endif

                    <div class="mb-5">
                        {{ $post_result->links() }}
                    </div>


                    @if(count($firmware_result) > 0)
                    <div class="card-header border-0 border-bottom-red-5px mb-4 font-weight-bold mb-5">
                        Firmware
                    </div>
                        @foreach($firmware_result as $file)
                            <article class="mt-4 mb-4">
                                <div class="row">
                                    <div class="col-md-9 col-sm-12">
                                        <div class="card-title bg-white">
                                            <a class="card-link text-dark font-weight-bold" href="{{ $file->path() }}">{{ __($file->title) }}</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <hr>
                        @endforeach
                    @endif

                    {{ $firmware_result->links() }}

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
