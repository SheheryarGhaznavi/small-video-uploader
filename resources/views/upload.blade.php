@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <upload-video inline-template>
            <div class="col-md-8">
                <div class="card p-3 d-flex justify-content-center align-items-center" v-if=!selected>

                    {{-- Hidden Input Field --}}
                    <input type="file" class="d-none" multiple ref="video" id="video" @change="upload">
                    {{-- Hidden Input Field --}}

                    <a onclick="document.getElementById('video').click()"><i style="color:red; font-size:70px" class="fa fa-youtube-play"></i></a>
                    <p class="text-center">Upload Videos</p>
                </div>

                <div class="card p-3" v-else>
                    <div class="my-4" v-for="video in videos">
                        <div class="progress mb-3">
                            <div class="progress-bar progress-bar-striped progress bar animated" role="progressbar" :style="{width: `${video.percentage || progress[video.name]}%`}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                @{{ video.percentage ? ( video.percentage == 100 ? "Video Successfully Uplaoded" : "Processing" ) : "Uploading" }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div v-if="!video.thumbnail" class="d-flex justify-content-center align-items-center" style="height:180px;color:white;font-size:18px;background:#808080">
                                    Loading Thumbnail .....
                                </div>
                                <img v-else :src="video.thumbnail" style="width:100%" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="text-center">
                                    <b>Title</b> : @{{ video.title || video.name }} <br>
                                    <b>Type</b> : @{{ video.type }} <br>
                                    <b>Last Modified Date</b> : @{{ video.lastModifiedDate }} <br>
                                    <b>Size</b> : @{{ video.size }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </upload-video>
    </div>
@endsection