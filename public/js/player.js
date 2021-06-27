var player = videojs('my-video')

var view_logged = false;

player.on('timeupdate',function () {
    var percentage_played = Math.ceil(player.currentTime() / player.duration() * 100);

    if (percentage_played > 5 && !view_logged) {
        axios.put(window.current_video+'/view');

        view_logged = true;
    }
})