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
        //
    
    }

    public function store(Request $request)
    {
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
        // User::create([
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "password" => Hash::make($password),
        //     "phone" => $request->phone,
        //     "role_id" => 2,
        //     "attachment_ktp" => $data['ktp'] ?? null,
        //     "attachment_npwp" => $data['npwp'] ?? null,
        //     "attachment_saving_book" => $data['saving_book'] ?? null,
        // ]);

        $usersales = User::where('role_id', 2)->latest()->first('id');
        
        $link = route('customer.show', $usersales->id);
        // userSales::create([
        //     'user_id' => $usersales->id,
        //     'link' => $link,
        // ]);
        // dd($password, $request->email);
        if ($request->link == 'wa') {
            return Redirect::to('https://wa.me/+6281310319488?text=HALLO%20BGB%20BERIKUT%20EMAIL%20DAN%20PASSWORD%20ANDA.%20%20%20%20%20%20E-MAIL%20:'. $request->email .'%20dan%20password%20:%20'. $password);

        }elseif($request->link == 'email')
        {
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $password,
                "link" => $link,
            ];

            Mail::to($request->email)->send(new SendMail($data));

            Alert::success('Success', 'Data User Berhasil di buat dengan E-mail');
            return back();
        }

        dd($password);
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
}
