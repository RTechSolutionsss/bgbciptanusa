<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Models\User;
Use Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Redirect;

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

        //return view('companies.index', compact('companies'));
    }

    public function Edit(Request $request)
    {   
        $this->validate($request,[
            'ktp' => 'max:1024|mimes:jpg,png',
            'npwp' => 'max:1024|mimes:jpg,png',
            'saving_book' => 'max:1024|mimes:jpg,png',
        ]);
        
        $data =  $request->all();
        if ($request->ktp != null) {
            $data['ktp'] = $request->file('ktp')->store('assets/ktp/'. Auth::id() ,'public'); 
        }
        if ($request->npwp != null) {
            $data['npwp'] = $request->file('npwp')->store('assets/npwp/'. Auth::id() ,'public'); 
        }
        if ($request->saving_book != null) {
            $data['saving_book'] = $request->file('saving_book')->store('assets/saving_book/'. Auth::id() ,'public'); 
        }
        $user = User::findOrFail($data['id']);
        $data['password'] = Hash::make($request->password);
        $user->update($data);
        Alert::success('Success', 'Data User Berhasil di updated');
        return back();
    }

    public function sendwa($id)
    {
        $base_url =  $_ENV['APP_URL'];
        $user = User::with('usersales')->findOrFail($id);
        $link =  route('customer.show', Crypt::encrypt($user->usersales->link));
        $url = route('login');
        return Redirect::to('https://wa.me/+62'.$user->phone.'?text=Selamat%20Bergabung%20dalam%20Program%20BGB%A0Citanusa%20Group!%20%20%20%20%20Berikut%20link%20akun%20anda:'. $link .'%20%20%20%20%20%20%20ID:%20%20:'. $user->email .'%20%20%20%20%20password%20:%20'. $user->first_password . '%20%20%20%20%20%20%20%20%20Happy%20Selling!%20url=%20'. $url);
    }
}
