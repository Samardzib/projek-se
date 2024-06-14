<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ToDoList;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function store(Request $request)
    {
        try {            
            $data = $request->all();
            $request->validate([
                'activity_time' => 'required',
                'activity_date' => 'required',
                'activity_name' => 'required',
            ]);
            unset($data['_token']);
            $data['activity_user_id'] = auth()->user()->id;

            $operation=Activity::create($data);
            return $this->responseCreate($operation);
        } catch (\Exception $e) {
            return $this->responseCreate($e->getMessage(),true);
        }
    }

    public function show($date)
    {
        $operation['activity'] = Activity::where('activity_user_id', auth()->user()->id)->where('activity_date', $date)->orderBy('activity_time', 'asc')->get();
        $operation['todolist'] = ToDoList::where('list_user_id', auth()->user()->id)->where('list_date', $date)->get();
        return $this->response($operation);
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }
}
