<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserSalesController extends Controller
{
    public function index($keyword, $page, $limit)
    {
        $page= isset($page) && $page != null && $page != 0 ? $page : 1;
        $limit = isset($limit) && $limit != null && $limit != 0 ? $limit : 10;
        
        $users = DB::table('user_sales')
        ->orderBy('name', 'desc')
        ->orderBy('created_at', 'desc')
        ->skip(($page * $limit) - 1)
        ->take($limit)
        ->get();
        //return view('companies.index', compact('companies'));
    }

    public function getDetails($id)
    {
        $users = DB::table('user_role')
                ->where('id', '=', $id)
                ->orderBy('created_at', 'desc')
                ->first();

        //return view('ocmpanies.index', compact('companies'));
    }

    public function Edit($id, UserRole $data)
    {
        $request =  $data->all();
        $finalData = UserRole::findOrFail($id);
        $finalData->update($request);

        //return view('ocmpanies.index', compact('companies'));
    }
}
