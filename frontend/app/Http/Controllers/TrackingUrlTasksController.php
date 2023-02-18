<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Alert;
use App\Models\trackingUrlTasks;
use App\Models\User;

class TrackingUrlTasksController extends Controller
{
    public function task($id)
    {
        $tasks = trackingUrlTasks::with('user')->where('user_id', $id)->get();
        return view('pages.tracking.index', compact('tasks'));
    }
    public function taskcustomer($id)
    {
        $task = User::where('id', $id)->first();
        return Response::json($task); 
    }

    public function update(Request $request)
    {
        for ($i=0; $i < count($request->idtask); $i++) { 
            $tracking = trackingUrlTasks::findOrFail($request->idtask[$i]);
            $tracking->status = $request->status[$i];
            $tracking->save();
        }
        Alert::success('Success', 'Data Tracking Berhasil diperbarui');
        return back();
    }
}
