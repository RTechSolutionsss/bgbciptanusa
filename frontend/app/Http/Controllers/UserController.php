<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\userSales;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Redirect,Response;
Use Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\Mail\SendMail;
use Mail;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.users.index',compact('users'));
    }

    public function show($id)
    {
        $users = User::all();
        return view('pages.users.index',compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'ktp' => 'max:1024|mimes:jpg,png',
            'npwp' => 'max:1024|mimes:jpg,png',
            'saving_book' => 'max:1024|mimes:jpg,png',
        ]);
        $data = $request->all();
        if ($request->ktp != null) {
            $data['ktp'] = $request->file('ktp')->store('assets/ktp/'. Auth::id() ,'public'); 
        }
        if ($request->npwp != null) {
            $data['npwp'] = $request->file('npwp')->store('assets/npwp/'. Auth::id() ,'public'); 
        }
        if ($request->saving_book != null) {
            $data['saving_book'] = $request->file('saving_book')->store('assets/saving_book/'. Auth::id() ,'public'); 
        }
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $password = $randomString;
        $userResult =  User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($password),
            'first_password' => $password,
            "phone" => $request->phone,
            "role_id" => 2,
            "attachment_ktp" => $data['ktp'] ?? null,
            "attachment_npwp" => $data['npwp'] ?? null,
            "attachment_saving_book" => $data['saving_book'] ?? null,
        ]);
       
        $usersales = User::where('role_id', 2)->latest()->first('id');
        
        $link = $usersales->id;
        userSales::create([
            'user_id' => $usersales->id,
            'link' => $link,
        ]);
        if($request->link == 'email')
        {
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $password,
                "link" => route('customer.show', Crypt::encrypt($link)),
            ];

            Mail::to($request->email)->send(new SendMail($data));

            Alert::success('Success', 'Data User Berhasil di buat dengan E-mail');
            return back();
        }else{
            Alert::success('Success', 'Data User Berhasil di buat dengan Whatsapp');
            return back();
        }
    }

    public function edit($id)
    {
        $user = User::with('usersales','userrole')->findOrFail($id);
        return Response::json($user); 
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = DB::table('users')
        ->where('id', 1)
        ->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
  
        Alert::success('Success', 'Data User Berhasil di hapus');
        return back();
    }

    public function export() 
    {
        Alert::success('Success', 'Data Berhasil di Export');
        return Excel::download(new UsersExport, 'customerbgb.xlsx');
    }
}
