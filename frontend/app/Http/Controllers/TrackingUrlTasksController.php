<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Alert;
use App\Models\trackingUrlTasks;

class TrackingUrlTasksController extends Controller
{
    public function task($id)
    {
        $task = trackingUrlTasks::with('user')->where('user_id', $id)->get();
        return Response::json($task); 
    }
}
