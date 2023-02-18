<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\trackingUrlTasks;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = User::whereBetween('created_at', [$request->startdate ?? Carbon::now()->startOfYear(),$request->enddate ?? Carbon::now()->endOfYear()]);
        $tracking = trackingUrlTasks::whereBetween('created_at', [$request->startdate ?? Carbon::now()->startOfYear(),$request->enddate ?? Carbon::now()->endOfYear()]);
        return view('pages.dashboard',compact('user','tracking'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sales()
    {
        return view('pages.dashboard');
    }
}
