<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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

        if($request['avatar']){
            $img=$request['avatar'];
            $avatar=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($avatar,File::get($img));
            $product->avatar=$avatar;
        }
       else{
            $product->avatar='default.jpg';
       }
        $product->url='http://127.0.0.1:8000/images';
        $product->cat_id=$request->cat_id;
        $product->detail=$request->detail;
        $product->quantity=$request->quantity;
        $product->save();
        return response()->json(
            [
                'status' =>200,
                'message' => 'Thêm thành công'
            ]
        );
    }
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $product =Product::find($id);
        $product->name_product=$data['nameProduct'];
        $product->price=$data['priceProduct'];
        if($request['avatarProduct']){
            Storage::disk('public')->delete($product->avatar);//
            $img=$request['avatarProduct'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($nameImg,File::get($img));
            $product->avatar=$nameImg;
        }
       else{
            $product->avatar='default.jpg';
       }
        
        $product->cat_id=$data['idCategory'];
        $product->detail=$data['detailProduct'];
        $product->quantity=$data['quantityProduct'];
      
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
        Storage::disk('public')->delete($product->avatar);//
        return $product->delete();
        
    }
}
