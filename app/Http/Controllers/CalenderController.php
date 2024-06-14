<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;

class CalenderController extends Controller
{
    public function index()
    {
        $activities = Activity::where('activity_date', date('Y-m-d'))->get();
        return view('calender.index', compact('activities'));
    }
}
