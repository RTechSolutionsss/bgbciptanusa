<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\products;

use Redirect,Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request,[
            'image' => 'required|max:1024|mimes:jpg,png',
        ]);
        $data = $request->all();
        $data['image'] = $request->file('image')->store('assets/product/'. $request->id_category ,'public');
        
        products::create([
            'id_category' => $request->id_category,
            'name_product' => $request->name_product,
            'description' => $request->description,
            'image' => $data['image'],
            'price' => '0'
        ]);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = products::findOrFail($id);
        return view('pages.katalog.productedit',compact('product')); 
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
        $product = products::findOrFail($id);
        $data = $request->all();
        if ($data['image'] != null) {
            $data['image'] = $request->file('image')->store('assets/product/'. $product->id ,'public');
        }
        $product->update($data);
        Alert::success('Success', 'Data User Berhasil di updated');
        return Redirect::route('katalog.show', $product->id_category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        products::find($id)->delete();
  
        Alert::success('Success', 'Data Product Berhasil di hapus');
        return back();
    }
}
