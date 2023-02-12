<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\User;
Use Alert;

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
        return view('companies.index', compact('companies'));
    }

    public function getDetails($id)
    {
        $users = DB::table('user_role')
                ->where('id', '=', $id)
                ->orderBy('created_at', 'desc')
                ->first();

        //return view('ocmpanies.index', compact('companies'));
    }

    public function Edit(Request $request)
    {
        $data =  $request->all();
        $user = User::findOrFail($data['id']);
        $user->update($data);
        Alert::success('Success', 'Data User Berhasil di updated');
        return back();
    }
}
