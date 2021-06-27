Vue.component('upload-video',{
    
    data: () => ({
        selected: false,
        videos: [],
        progress: {},
        uploads: [],
        intervals: {}
    }),

    methods: {
        upload() {
            this.selected = true;
            this.videos = Array.from(this.$refs.video.files);

            const uploaders = this.videos.map(video => {

                this.progress[video.name] = 0;

                const form = new FormData()
                form.append('title',video.name)
                form.append('size',video.size)
                form.append('type',video.type)
                form.append('lastModified',video.lastModified)
                form.append('video',video)

                return axios.post('',form,{
                    onUploadProgress : (event) => {
                        this.progress[video.name] = Math.ceil(( event.loaded * 100 ) / event.total)
                        this.$forceUpdate()
                    }
                }).then(({data}) => {

                    this.videos = this.videos.map(v => {
                        if (v.id == data.id) {
                            return data;
                        }
                        return v
                    })

                    
                    this.uploads = [
                        ...this.uploads,
                        data
                    ]
                    
                    video.thumbnail = data.thumbnail;
                    video.percentage = 100;
                    
                }).catch((error) => {
                        if (error.response) {
                            this.resetProgress(video);
                            console.log(error.response.data);
                        } else if (error.request) {
                            // The request was made but no response was received
                            this.resetProgress(video);
                            console.log(error.request);
                        } else {
                            // Something happened in setting up the request that triggered an Error
                            this.resetProgress(video);
                            console.log('Error', error.message);
                        }
                    }
                )
            })
        },

        resetProgress(video) {
            this.progress[video.name] = 0;
            this.$forceUpdate();
            alert(`Upload Failed of video {${video.name}}`);
        }
    },
});