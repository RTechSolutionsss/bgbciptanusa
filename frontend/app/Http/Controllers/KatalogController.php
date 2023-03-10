<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\catalogs;
use Illuminate\Http\Request;
Use Alert;
use Redirect,Response;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $katalog = catalogs::all();
        return view('pages.katalog.index', compact('katalog'));
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
        $data = $request->all();
        catalogs::create($data);

        Alert::success('Success', 'Data Katalog Berhasil di input');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $katalog = catalogs::with('product')->findOrFail($id);
        return view('pages.katalog.show', compact('katalog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $katalog = catalogs::findOrFail($id);
        return Response::json($katalog); 
    }

    public function editing(Request $request)
    {
        $data =  $request->all();
        $katalog = catalogs::findOrFail($data['id']);
        $katalog->update($data);
        Alert::success('Success', 'Data User Berhasil di updated');
        return back();
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
        catalogs::find($id)->delete();
  
        Alert::success('Success', 'Data Katalog Berhasil di hapus');
        return back();
    }
}
