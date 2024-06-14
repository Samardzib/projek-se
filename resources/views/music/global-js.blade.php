<script>
    var music = [];
    var currentTrackIndex = 0;
    
    const audioPlayer = document.getElementById('audio-player');
    const playPauseButton = document.getElementById('play-pause-button');
    const songTitle = document.getElementById('song-title');
    const songTime = document.getElementById('song-time');
    const songCover = document.getElementById('song-cover');
    
    function playMusic(src, title, cover, index) {
        audioPlayer.src = src;
        audioPlayer.play();
        songTitle.innerText = title;
        songCover.src = `/album-list/${cover}`;
        playPauseButton.innerHTML = `<img src="{{  asset('asset-icon/LogoMusicPlay2.png') }}" alt="Pause">`;
        updateSongTime();
        currentTrackIndex = index;
    }
    
    function playPauseMusic() {
        if (audioPlayer.paused) {
            audioPlayer.play();
            playPauseButton.innerHTML = `<img src="{{ asset('asset-icon/LogoPlayMusic.png') }}" alt="Pause">`;
        } else {
            audioPlayer.pause();
            playPauseButton.innerHTML = `<img src="{{ asset('asset-icon/LogoMusicPlay2.png') }}" alt="Play">`;
        }
    }
    
    function setVolume(volume) {
        audioPlayer.volume = volume / 100;
    }
    
    function updateSongTime() {
        audioPlayer.addEventListener('timeupdate', () => {
            var currentTime = formatTime(audioPlayer.currentTime);
            var duration = formatTime(audioPlayer.duration);
            if(duration == 'NaN:NaN'){
                duration = '00:00';
            }
            songTime.innerText = `${currentTime} / ${duration}`;
        });
    }
    
    function formatTime(seconds) {
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
    }
    
    function repeatMusic() {
        audioPlayer.loop = !audioPlayer.loop;
    }
    
    function prevMusic() {
        if (currentTrackIndex > 0) {
            currentTrackIndex--;
        } else {
            currentTrackIndex = music.length - 1; // Loop to the last track
        }
        const track = music[currentTrackIndex];
        playMusic(`music-list/${track.music_url}`, track.music_name, track.music_cover, currentTrackIndex);
        playPauseButton.innerHTML = `<img src="{{ asset('asset-icon/LogoPlayMusic.png') }}" alt="Play">`;
    }
    
    function nextMusic() {
        if (currentTrackIndex < music.length - 1) {
            currentTrackIndex++;
        } else {
            currentTrackIndex = 0; // Loop to the first track
        }
        const track = music[currentTrackIndex];
        playMusic(`music-list/${track.music_url}`, track.music_name, track.music_cover, currentTrackIndex);
        playPauseButton.innerHTML = `<img src="{{ asset('asset-icon/LogoPlayMusic.png') }}" alt="Play">`;
    }
    
    function shuffleMusic() {
        currentTrackIndex = Math.floor(Math.random() * music.length);
        const track = music[currentTrackIndex];
        playMusic(`music-list/${track.music_url}`, track.music_name, track.music_cover, currentTrackIndex);
    }
    
    var urlpath = {
        show: "{{ route('music.show', ['music' => ':id']) }}",
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        onShowMusic = () => {
            $.ajax({
                url: urlpath.show.replace(':id', 1),
                type: 'GET',
                success: function(response) {
                    music = response.data;
                    $('.music-grid').html('');
                    $.each(response.data, function(key, value) {
                        if(key == 0){
                            playMusic(`music-list/${value.music_url}`, value.music_name, value.music_cover, key)
                            playPauseMusic()
                            playPauseButton.innerHTML = `<img src="{{  asset('asset-icon/LogoMusicPlay2.png') }}" alt="Pause">`;
                        }
                    });
                },
                complete: function() {}
            });
        }
        onShowMusic();
    });
    
    </script>