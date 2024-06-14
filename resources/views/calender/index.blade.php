@extends('layouts.main')

@section('app-title', 'Calendar')

@section('main-content')
<style>
    .pc-container {
        padding: 20px;
        /* height: 100vh; */
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 20px;
    }
    .calendar-container, .todo-container {
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
        width: 500px;
    }
    #calendar {
        width: 100%;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }
    .fc-toolbar-title {
        font-size: 1.5em;
        color: #333;
    }
    .fc-daygrid-day {
        text-align: center;
        color: #333;
    }
    
    .fc-daygrid-day-number {
        color: #DA8975;
        font-size: 1em;
    }
    .fc-day-today {
        background-color: #DA8975;
    }
    .fc-daygrid-day:hover {
        cursor: pointer;
        background-color: #e6e6e6;
    }
    .fc-day-selected {
        background-color: #DA8975 !important;
        color: white;
    }
    .progress-bar {
        background-color: #e0e0e0;
        border-radius: 8px;
        margin-bottom: 20px;
        overflow: hidden;
        position: relative;
    }
    .progress {
        height: 10px;
        background-color: #DA8975;
    }

    #todo-list {
        list-style: none;
        padding: 0;
    }
    #todo-list li {
        margin-bottom: 10px;
        font-size: 18px;
    }
    .activities-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }
    .activities-header h3 {
        margin: 0;
    }
    .add-activity-btn {
        background-color: #d9534f;
        color: white;
        border: none;
        border-radius: 20%;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        cursor: pointer;
    }
    .time-block {
            border-bottom: 1px solid #000;
            padding: 10px 0;
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
</style>
<section class="pc-container">
    <div>
        <h3>Calendar</h3>
        <div class="calendar-container">
            <div id='calendar'></div>
            <div class="activities-header">
                <h4>Your Activities</h4>
                <button class="add-activity-btn" onclick="$('#your_activities').modal('show')">+</button>
            </div>
            <div class="your_activities_data"></div>
        </div>
    </div>
    <div>
        <h3>To Do List</h3>
        <div class="todo-container">
            <h4 class="mt-7">Your Progress (<span  id="progress-percentage">0%</span>)</h4>
            <div class="progress-bar">
                <div class="progress" id="progress"></div>
            </div>
        </div>
        <div class="todo-container" style="margin-top: 20px">
            <div class="activities-header">
                <h4>Today</h4>
                <button class="add-activity-btn" onclick="$('#todo_activities').modal('show')">+</button>
            </div>
            <ul id="todo-list" class="todolist_data" style="padding: 10px"></ul>
        </div>
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
</section>

<div class="modal fade" id="your_activities" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:9999999;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Your Schedule</h5>
            </div>
            <div class="modal-body">
                <form action="javascript:onSave()" id="formData" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label class="d-flex align-items-center fs-5 fw-normal mb-2">Time</label>
                        <input type="time" class="form-control form-control-solid" name="activity_time" id="activity_time"/>
                    </div>
                    <div class="col-md-6">
                        <label class="d-flex align-items-center fs-5 fw-normal mb-2">Date</label>
                        <input type="date" class="form-control form-control-solid date_now" name="activity_date" id="activity_date"/>
                    </div>
                    <div class="col-md-12">
                        <label class="d-flex align-items-center fs-5 fw-normal mb-2">Your Activity</label>
                        <input type="text" class="form-control form-control-solid" name="activity_name" id="activity_name" placeholder="Your Activity"/>
                        <button type="submit" class="btn btn-sm btn-primary py-3 mt-3" style="width: 100%">Simpan Data
                            <span class="svg-icon svg-icon-3 ms-1 me-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                        transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                    <path
                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                   
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="todo_activities" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" style="z-index:9999999;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">To Do List</h5>
            </div>
            <div class="modal-body">
                <form action="javascript:onSave(2)" id="formData2" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label class="d-flex align-items-center fs-5 fw-normal mb-2">Date</label>
                        <input type="date" class="form-control form-control-solid date_now" name="list_date" id="list_date"/>
                    </div>
                    <div class="col-md-12">
                        <label class="d-flex align-items-center fs-5 fw-normal mb-2">List Name</label>
                        <input type="text" class="form-control form-control-solid" name="list_name" id="list_name" placeholder="List Name"/>
                        <button type="submit" class="btn btn-sm btn-primary py-3 mt-3" style="width: 100%">Simpan Data
                            <span class="svg-icon svg-icon-3 ms-1 me-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                        transform="rotate(-180 18 13)" fill="currentColor"></rect>
                                    <path
                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                        fill="currentColor"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                   
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css-plugin')
<link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
@endsection

@section('js-plugin')
@include('calender.js')
@include('music.global-js')
@endsection
