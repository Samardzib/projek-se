<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;

class MusicController extends Controller
{
    public function index()
    {
        return view('music.index');
    }

    public function show($id)
    {
        $operation = Music::all();
        return $this->response($operation);
    }
}
