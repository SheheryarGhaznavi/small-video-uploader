<?php

namespace App\Jobs\Video;

use FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class ConvertFormat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $video;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $low = (new X264('aac'))->setKiloBitrate(100);
        $medium = (new X264('aac'))->setKiloBitrate(250);
        $high = (new X264('aac'))->setKiloBitrate(500);
        Log::info($this->video->original_path);
        FFMpeg::fromDisk('local')
            ->open($this->video->original_path)
            ->exportForHLS()
            ->onProgress(function ($percentage) {
                $this->video->percentage = $percentage;
                $this->video->save();
            })
            ->addFormat($low)
            ->addFormat($medium)
            ->addFormat($high)
            ->save("public/videos/{$this->video->id}/{$this->video->id}.m3u8");
    }
}
