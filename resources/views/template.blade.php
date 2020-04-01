@extends('layouts.master')
@section('pageTitle', $page->title)
@section('meta-title', $page->title)
@section('meta-description', $page->description)
@section('content')
    <section class="mt-3">
        <div class="container p-0">

            <div class="row p-4">
                <div class="col-md-8 col-sm-12">
                    <div class="card border-0">
                        <h6 class="card-header bg-white">{{ __($page->title) }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            {!! $page->body !!}
                        </div>
                    </div>

                </div>

                @include('inc.right-sidebar')
            </div>
        </div>
    </section>
@endsection
