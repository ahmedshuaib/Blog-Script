@extends('layouts.app')
@section('page-header-title', $page->title)
@section('page-current-position', $page->title)
@section('pageTitle', 'CurrentPage');
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __($page->title) }}</h3>
        </div>
        <div class="card-body">

            <div class="card-text mb-3">
                {{ __($page->description) }}
            </div>

            <div class="card-text">
                {!! __($page->body) !!}
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
