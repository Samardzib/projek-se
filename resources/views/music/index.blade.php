@extends('layouts.main')

@section('app-title', 'Music')
@inject('carbon', 'Carbon\Carbon')

@section('css-plugin')
<link rel="stylesheet" href="{{ asset('assets') }}/css/plugins/datepicker-bs5.min.css">
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('main-content')
<style>
    .pc-content{
        padding-bottom: 100px;
        background-color: #f4f5f7;
    }
    .music-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f4f5f7;
    }
    .music-header {
        text-align: center;
        margin-bottom: 20px;
    }
    .music-header h1 {
        font-size: 2em;
        margin: 0;
    }
    .music-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }
    .music-item {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 180px;
        padding: 10px;
        text-align: center;
        cursor: pointer;
    }
    .music-item img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 10px;
    }
    .music-item-title {
        font-size: 1em;
        font-weight: bold;
        color: #333;
        margin: 0;
    }
    .footer-player {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: #fff;
        border-top: 1px solid #ddd;
        box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 20px;
        z-index: 1000;
    }
    .footer-player img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        margin-right: 10px;
    }
    .footer-player .song-info {
        display: flex;
        align-items: center;
    }
    .footer-player .song-info .title {
        font-size: 1em;
        font-weight: bold;
        color: #333;
        margin: 0 10px;
    }
    .footer-player .song-info .time {
        font-size: 0.9em;
        color: #888;
        margin-left: 10px;
    }
    .footer-player .controls {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .footer-player .controls button {
        background-color: transparent;
        border: none;
        cursor: pointer;
        padding: 5px;
        font-size: 1.2em;
    }
    .footer-player .volume-control {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    .footer-player .volume-control input[type="range"] {
        width: 100px;
    }
</style>
<section class="pc-container">
    <div class="pc-content">
        <div class="music-container">
            <div class="music-header">
                <h4>Let's listen to some relaxing music</h4>
            </div>
            <h5>Popular songs for study</h5>
            <div class="music-grid">

            </div>
        </div>
        <div class="footer-player">
            <audio id="audio-player" src="" preload="auto"></audio>
            <div class="song-info">
                <img id="song-cover" src="https://via.placeholder.com/50" alt="Song Cover">
                <div>
                    <div id="song-title" class="title">Relaxing Blues Songs</div>
                    <div id="song-time" class="time">00:00 / 00:00</div>
                </div>
            </div>
            <div class="controls">
                <button onclick="repeatMusic()"><img src="{{ asset('asset-icon/LoopMusicLogo.png') }}" alt="Repeat"></button>
                <button onclick="prevMusic()"><img src="{{ asset('asset-icon/LogoMusicPrevious2.png') }}" alt="Previous"></button>
                <button id="play-pause-button" onclick="playPauseMusic()"><img src="{{ asset('asset-icon/LogoMusicPlay2.png') }}" alt="Play"></button>
                <button onclick="nextMusic()"><img src="{{ asset('asset-icon/LogoMusicNext2.png') }}" alt="Next"></button>
                {{-- <button onclick="shuffleMusic()"><img src="{{ asset('asset-icon/LogoShuffleMusic.png') }}" alt="Shuffle"></button> --}}
            </div>
            <div class="volume-control">
                <img src="{{ asset('asset-icon/LogoSoundMusic.png') }}" alt="Volume">
                <input type="range" min="0" max="100" value="50" onchange="setVolume(this.value)">
            </div>
        </div>
    </div>
</section>
@endsection

@section('js-plugin')
<script src="{{ asset('assets') }}/js/code.jquery.com_jquery-3.7.0.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@include('music.js')
@endsection
