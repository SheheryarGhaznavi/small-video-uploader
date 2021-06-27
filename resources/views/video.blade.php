@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    <div class="card-header">{{$video->title}}</div>

                    <div class="card-body">
                        
                        <video-js id="my-video" class="vjs-default-skin" controls preload="auto" width="640" height="268">
                            <source src='{{ asset(Storage::url("videos/$video->id/$video->id.m3u8")) }}' type="application/x-mpegURL">
                        </video-js>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mt-3">
                                    
                                    {{ $video->title }}
                                
                                </h4>
                            </div>
                        </div>

                        <hr>

                        <div>
                                {{ $video->description }}
                        </div>

                        <hr>


                    </div>


            </div>
        </div>
    </div>
</div>
@endsection


@section('styles')
    <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />

    <style>
        .thumbs-up-active, .thumbs-down-active {
            color: green
        }

        .w-full {
            width: 100% !important
        }

        .w-80 {
            width: 80% !important
        }
    </style>
@endsection


@section('scripts')
    <script src="https://vjs.zencdn.net/7.5.4/video.js"></script>

    <script>
        window.current_video = '{{ $video->id }}'
    </script>

    <script src="{{ asset('js/player.js') }}"></script>
@endsection