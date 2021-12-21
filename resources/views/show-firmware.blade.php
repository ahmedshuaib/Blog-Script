@extends('layouts.master')
@section('pageTitle', $firmware->title)
@section('meta-title', $firmware->title)
@section('meta-description', $firmware->description)
@section('content')
    <section class="mt-3">
        <div class="container p-0">
            <div class="col-md-12 p-4 col-sm-12">
                <div class="card rounded-0 bg-white">

                    <div class="card-body">
                        <h4 class="card-title text-center"> {{ __($firmware->title) }}  </h4>
                        <!-- @if(count($firmware->tags()->pluck('title')) > 0)
                            <div class="card-header bg-white border-0 text-center">
                                @foreach($firmware->tags()->pluck('title') as $tag)
                                    <span class="badge badge-primary badge-pill">{{ __($tag) }}</span>
                                @endforeach
                            </div>
                        @endif -->

                        @if($firmware->thumbnail != 'noimage.png')
                            <img src="{{ asset('/storage/img/'.$firmware->thumbnail) }}" class="img-thumbnail border-0" alt="">
                        @endif

                        <div class="card-text text-center">
                            {!! __($firmware->body) !!}
                        </div>


                        <div class="card-comments">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td class="font-weight-bold text-right">Date : </td>
                                    <td class="text-left text-muted">{{ $firmware->created_at }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold text-right">Firmware Size : </td>
                                    <td class="text-left text-muted">{{ __($firmware->firmware_size) }}
                                    <span>{{ $firmware->data_type }}</span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                        </div>

                        <a class="btn btn-primary btn-block" target="_blank" href="{{ $firmware->download_link }}"><i class="fas fa-download"></i> Download</a>

                    </div>


                </div>
            </div>
        </div>
    </section>
@endsection
