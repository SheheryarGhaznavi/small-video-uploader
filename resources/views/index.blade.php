@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">




            <div class="card">
                <div class="card-header">
                    All Videos
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Original Type</th>
                            <th>Last Modification Date</th>
                            <th>Status</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($videos as $key => $video)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img src="{{ $video->thumbnail }}" width="40px" height="40ox" alt="" srcset="">
                                    </td>
                                    <td>{{ $video->title }}</td>
                                    <td>{{ $video->type }}</td>
                                    <td>{{ $video->lastModifiedDate }}</td>
                                    <td>{{ $video->percentage == 100 ? 'Live' : 'Processing' }}</td>
                                    <td>
                                        @if ($video->percentage === 100)
                                            <a target="blank" href="/video/{{$video->id}}" class="btn btn-sm btn-info">View</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <div class="row justify-content-center">
                            {{ $videos->links() }}
                        </div>
                    </table>
                </div>
            </div>




        </div>
    </div>
</div>
@endsection
