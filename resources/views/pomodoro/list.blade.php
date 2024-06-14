@extends('layouts.main')

@section('app-title', 'Pomodoro Timer')

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
        /* background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
    }

    .timer-section {
        flex: 8;
        /* 80% */
        display: flex;
        flex-direction: column;
        justify-content: start;
        align-items: center;
        padding: 20px;
        border-right: 1px solid #ddd;
    }

    .music {
        flex: 2;
        /* 20% */
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        padding: 20px;
    }

    .timer {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        font-size: 5em;
        color: #333;
    }

    .time {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 20px;
        margin: 0 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .colon {
        margin: 0 10px;
        font-size: 1em;
    }

    .start-button {
        padding: 10px 20px;
        background-color: #f26522;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 1em;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .start-button::before {
        content: url('{{ asset('asset-icon/LogoStartButton.png') }}');
        /* Unicode character for play icon */
        margin-right: 10px;
        font-size: 1.2em;
    }

    .start-button:hover {
        background-color: #d2541e;
    }

    .stop-button {
        padding: 10px 20px;
        background-color: #f26522;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 1em;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .stop-button::before {
        content: url('{{ asset('asset-icon/LogoStopButton.png') }}');
        /* Unicode character for play icon */
        margin-right: 10px;
        font-size: 1.2em;
    }

    .stop-button:hover {
        background-color: #d2541e;
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
        background-color: #f26522;
        color: white;
        padding: 5px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .music-item-controls button:hover {
        background-color: #d2541e;
    }

</style>

<section class="pc-container">
    <div class="pomodoro-container">
        <div class="timer-section">
            <a href="javascript:onModal()">Set Timer</a>
            <div class="timer">
                <span class="time" id="time_min">25</span>
                <span class="colon">:</span>
                <span class="time" id="time_sec">00</span>
            </div>
            <button class="start-button" onclick="startTimer()">START</button>
            <button class="stop-button" onclick="stopTimer()" style="display: none">STOP</button>
        </div>
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
                            {{-- <button style="background-color: transparent;border: none;cursor: pointer;padding: 0;">
                                <img src="{{ asset('asset-icon/LogoLeftMusic.png') }}" alt="Start" style="width: 30px; height: 30px;">
                            </button> --}}
                            {{-- <button style="background-color: transparent;border: none;cursor: pointer;padding: 0;">
                                <img src="{{ asset('asset-icon/LogoPlayMusic.png') }}" alt="Start" style="width: 30px; height: 30px;">
                            </button> --}}
                            {{-- <button style="background-color: transparent;border: none;cursor: pointer;padding: 0;">
                                <img src="{{ asset('asset-icon/LogoRightMusic.png') }}" alt="Start" style="width: 30px; height: 30px;">
                            </button> --}}
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

<div class="modal fade" id="set_timer" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:9999999;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Set Timer</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="d-flex align-items-center fs-5 fw-normal mb-2">Minutes</label>
                        <input type="number" class="form-control form-control-solid" name="choose_min" id="choose_min" min="0"/>
                    </div>
                    <div class="col-md-6">
                        <label class="d-flex align-items-center fs-5 fw-normal mb-2">Seconds</label>
                        <input type="number" class="form-control form-control-solid" name="choose_sec" id="choose_sec" min="0" max="59"/>
                    </div>
                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm py-3 mt-3" style="width: 100%;background-color: #f26522;color:white" onclick="onDefineTimer()">Save Time
                        </button>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css-plugin')
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endsection

@section('js-plugin')
@include('pomodoro.js')
@include('music.global-js')
@endsection