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
    public function indexWithDetail($keyword, $page, $limit)
    {
        $page= isset($page) && $page != null && $page != 0 ? $page : 1;
        $limit = isset($limit) && $limit != null && $limit != 0 ? $limit : 10;
        
        $sales = DB::table('user_sales')
        ->where('link', 'like', `$keyword`)
        ->orWhere('status', 'like', `$keyword`)
        ->orderBy('created_at', 'desc')
        ->skip(($page * $limit) - 1)
        ->take($limit)
        ->get();
        
        $users = DB::table('users')
        ->where('role_id', '=', `2`)
        ->orWhere('status', 'like', `$keyword`)
        ->orderBy('created_at', 'desc')
        ->skip(($page * $limit) - 1)
        ->take($limit)
        ->get();

        $parent_id =array_column($sales, 'user_id');

        $customer = DB::table('user_customer')
        ->select('*')
        ->whereIn('parent_id',  $parent_id)
        ->orWhere('status', 'like', `$keyword`)
        ->orderBy('created_at', 'desc')
        ->skip(($page * $limit) - 1)
        ->take($limit)
        ->get();
        //return view('companies.index', compact('companies'));
    }
    
    public function getDetails($id)
    {
        $users = DB::table('user_sales')
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
