<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        $users = Product::
            join('category', 'product.cat_id', '=', 'category.id')
            ->select(
                'product.*', 
                'category.cat_name as name_cat'
                )
            ->get();        
            return response()->json($users);       
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
        //
        $product =new Product();
        $product->name_product=$request->name_product;
        $product->price=$request->price;
        $product->avatar=$request->avatar;
        $product->cat_id=$request->cat_id;
        $product->save();
        return redirect()->route('product.index');
    }
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $product =Product::find($id);
        $product->name_product=$data['name_product'];
        $product->price=$data['price'];
        $product->avatar=$data['avatar'];
        $product->cat_id=$data['cat_id'];
        $product->save();
        return redirect()->route('product.index');
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
        return Product::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
        //
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
        //
    
    public function destroy($id)
    {
        $product =Product::find($id);
        return $product->delete();
        
    }
}
