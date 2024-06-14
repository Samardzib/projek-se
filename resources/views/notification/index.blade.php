@extends('layouts.main')

@section('app-title', 'Notification')

@section('main-content')
<style>
    .pc-container {
        padding: 20px;
        height: 100vh;
        background-color: #f4f5f7;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 20px;
    }

    .pomodoro-container {
        display: flex;
        width: 80%;
    }

    .notification-section {
        flex: 8; /* 80% */
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 20px;
        border-right: 1px solid #ddd;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .music {
        flex: 2; /* 20% */
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        padding: 20px;
        gap: 10px;
    }

    .notification {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
       
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .notification-icon {
        color: red;
        margin-right: 10px;
    }

    .notification-text {
        flex-grow: 1;
    }

    .notification-time {
        color: #888;
        font-size: 12px;
    }

    .music-header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .music-header h5 {
        margin: 0;
        font-size: 1em;
        color: #333;
    }

    .see-all {
        background-color: #f26522;
        color: white;
        padding: 5px 10px;
        border-radius: 5px;
        border: none;
        font-size: 0.8em;
        cursor: pointer;
    }

    .see-all:hover {
        background-color: #d2541e;
    }

    .music-content {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .music-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .music-item img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
    }

    .music-item-details {
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .music-item-title {
        font-size: 0.9em;
        font-weight: bold;
        color: #333;
        margin: 0;
    }

    .music-item-controls {
        display: flex;
        gap: 5px;
    }

    .music-item-controls button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .music-item-controls img {
        width: 30px;
        height: 30px;
    }

    .ads {
        width: 100%;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

</style>

<section class="pc-container">
    <div class="pomodoro-container">
        <div class="notification-section"></div>
        <div class="music">
            <div class="music-header">
                <h5>Music</h5>
                <button class="see-all" onclick="window.location.href='/music'">See all</button>
            </div>
            <div class="music-content">
                <div class="music-item">
                    <audio id="audio-player" src="" preload="auto"></audio>
                    <img id="song-cover" src="https://via.placeholder.com/50" alt="Song Cover">
                    <div class="music-item-details">
                        <p class="music-item-title" id="song-title">Relaxing Blues Songs</p>
                        <p class="music-item-title" id="song-time">00:00 / 00:00</p>
                        <div class="music-item-controls">
                            <button style="background-color: transparent;border: none;cursor: pointer;padding: 0;" onclick="prevMusic()"><img src="{{ asset('asset-icon/LogoLeftMusic.png') }}" alt="Previous" style="width: 30px; height: 30px;"></button>
                            <button style="background-color: transparent;border: none;cursor: pointer;padding: 0;" id="play-pause-button" onclick="playPauseMusic()"><img src="{{ asset('asset-icon/LogoPlayMusic.png') }}" alt="Play" style="width: 30px; height: 30px;"></button>
                            <button style="background-color: transparent;border: none;cursor: pointer;padding: 0;" onclick="nextMusic()"><img src="{{ asset('asset-icon/LogoRightMusic.png') }}" alt="Next" style="width: 30px; height: 30px;"></button>
                        </div>
                    </div>
                </div>
                <img src="{{ asset('asset-icon/Ads.png') }}" alt="Example Image" width="100%">
                <!-- Additional music items can be added here -->
            </div>
        </div>
    </div>
</section>

@endsection

@section('js-plugin')
@include('notification.js')
@include('music.global-js')
@endsection
