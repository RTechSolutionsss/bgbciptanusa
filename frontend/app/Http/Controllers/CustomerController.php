<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\catalogs;
use App\Models\products;
use App\Models\UserCustomer;
use App\Models\trackingUrlTasks;
use App\Models\User;
use App\Models\UserSales;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\Crypt;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katalog = catalogs::with('product')->get();
        return view('pages.customer.index', compact('katalog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tracking = trackingUrlTasks::where('ip_address', $request->ip())->first();
        $user = User::where('id', $tracking->user_id)->first();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->save();
        UserCustomer::create([
            'address' => $request->address,
            'city' => $request->city,
            'no_ktp' => $request->no_ktp,
            'tgl_lahir' => $request->tgl_lahir,
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'age' => $request->usia,
            'job' => $request->pekerjaan,
            'source_information' => $request->source_information,
        ]);

        Alert::success('Success', 'Data User Berhasil di input');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $decrypted = Crypt::decrypt($id);;
        } catch (DecryptException $e) {
            $e->getMessage();
            info("Error....!!");
        }
        dd($id);

        $katalog = catalogs::with('product')->get();
        $length = 8;
        $lengths = 3;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        $randomStr = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        for ($i = 0; $i < $lengths; $i++) {
            $randomStr .= $characters[rand(0, $charactersLength - 1)];
        }
        $password = $randomString;
        $random = $randomStr;
        $email = 'dummy'.$random.'@gmail.com';
        $tracking = trackingUrlTasks::where('ip_address', $request->ip())->first('ip_address');
        if($tracking == null)
        {
            User::create(
            [
                'name' => 'Dummy',
                'email' => $email,
                'password' => Hash::make($password),
                'role_id' => 3,
                'parent_id' => $id,
            ]);
            
            $usercustomer = User::where('role_id', 3)->latest()->first('id');
            $trackingname = [
                "Open link BGB",
                "Followup HA",
                "Pembuatan SP/Closing",
                "PPJB",
                "Pencairan Dana"
            ];
            for ($i=0; $i < count($trackingname); $i++) { 
                trackingUrlTasks::updateOrCreate(
                [
                    'ip_address' => $request->ip(),
                ], 
                [
                    'name' => $trackingname[$i],
                    'user_id' => $usercustomer->id,
                    'ip_address' => $request->ip(),
                    'status_changed_at' => Carbon::now(),
                ]);
            }
            $usercustomer->parent_id = $id;
            $usercustomer->save();
        }

        return view('pages.customer.index', compact('katalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::with('category')->findOrFail($id);
        return view('pages.customer.create', compact('product'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
