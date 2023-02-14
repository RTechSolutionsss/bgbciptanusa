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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $katalog = catalogs::with('product')->get();
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $password = $randomString;
        // User::updateOrCreate([

        // ],
        // [
        //     'name' => 'Dummy',
        //     'email' => 'dummy@gmail.com',
        //     'password' => Hash::make($password),
        //     'role_id' => 3,
        //     'parent_id' => $id,
        // ]);
        $usercustomer = User::where('role_id', 3)->latest()->first('id');
        // UserCustomer::updateOrCreate([

        // ],
        // [
        //     'user_id' => $usercustomer->id,
        //     'category_id' => 2,
        //     'age' => 0,
        //     'job' => 'dummy',
        //     'source_information' => 'dummy',
        // ]);
        $trackingname = [
            "Open link BGB",
            "Followup HA",
            "Pembuatan SP/Closing",
            "PPJB",
            "Pencairan Dana"
        ];
        for ($i=0; $i < count($trackingname); $i++) { 
            trackingUrlTasks::create([
                'name' => $trackingname[$i],
                'user_id' => $usercustomer->id,
                'ip_address' => $request->ip(),
                'status_changed_at' => Carbon::now(),
            ]);
        }
        $usercustomer->parent_id = $id;
        $usercustomer->save();

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
