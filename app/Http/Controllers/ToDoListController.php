<?php

namespace App\Http\Controllers;

use App\Models\ToDoList;
use App\Models\Activity;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function store(Request $request)
    {
        try {            
            $data = $request->all();
            $request->validate([
                'list_date' => 'required',
                'list_name' => 'required',
            ]);
            unset($data['_token']);
            $data['list_user_id'] = auth()->user()->id;

            $operation=ToDoList::create($data);
            return $this->responseCreate($operation);
        } catch (\Exception $e) {
            return $this->responseCreate($e->getMessage(),true);
        }
    }

    public function update(Request $request, $id){
        try {
            $data = $request->all();
            unset($data['_token']);
            
            $operation = ToDoList::where('list_id',$id)->update($data);
            return $this->responseUpdate($operation);
        } catch (\Exception $e) {
            return $this->responseUpdate($e->getMessage(),true);
        }
    }

    public function index()
    {
        $operation = Activity::where('activity_user_id', auth()->user()->id)->where('activity_date', date('Y-m-d'))->orderBy('activity_time', 'asc')->get();
        return $this->response($operation);
    }

    public function destroy(ToDoList $activity)
    {
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'ToDoList deleted successfully.');
    }
}
