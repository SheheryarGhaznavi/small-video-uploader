<?php

namespace App\Http\Controllers;

use App\Jobs\Video\ConvertFormat;
use App\Jobs\Video\CreateVideoThumbnail;
use App\Models\Models\Video;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::paginate(15);
        return view('index', compact('videos'));
    }

    public function uploadView()
    {
        return view('upload');
    }

    public function show(Video $video)
    {
        if (request()->wantsJson()) {
            return $video;
        } else {
            return view('video',compact('video'));
        }
    }


    public function uploadSave(Request $request)
    {
        $video = new Video();
        $video->title = $request->title;
        $video->type = $request->type;
        $video->size = $request->size;
        $video->lastModifiedDate = Carbon::createFromTimestamp($request->lastModified / 1000)->toDateTimeString();
        $video->original_path = $request->video->store("videos/");
        $video->save();

        $this->dispatch(new CreateVideoThumbnail($video));
        $this->dispatch(new ConvertFormat($video)); // Queue based

        return $video;
    }
    
}
