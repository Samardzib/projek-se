<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ToDoList;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notification.index');
    }

    public function show($date)
    {
        $operation = ToDoList::where('list_user_id', auth()->user()->id)->where('list_date', date('Y-m-d'))->get();
        return $this->response($operation);
    }
}
