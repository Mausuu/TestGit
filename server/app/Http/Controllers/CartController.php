<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $result =[];
        foreach ($cart as $row)
        {
            array_push($result, $row);
        }
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_users=$request->id_user;
        $id_product=$request->id_product;
        $product_qty=$request->product_qty;
         
        $product_check = Product::where('id',$id_product)->first();
        if($product_check)
        {
           if(Cart::where('id_product',$id_product)->where('id_user',$id_user)->exist())
           {
            return response()->json(
                [
                   'status'=>400,
                   'message'=>'Cart ton tai san sp'
                ]
            );
           }
           else
           {
            $cart = new Cart;
            $id_users=$request->id_user;
            $id_product=$request->id_product;
            $product_qty=$request->product_qty;
            $cart->save();
            return response()->json(
                [
                   'status'=>201,
                   'message'=>'i am in cart'
                ]
            );
           }
        }
        else
        {
            return response()->json(
                [
                   'status'=>404,
                   'message'=>'not found'
                ]
            );
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);  
        Cart::add([
            'id' => $product->id,
            'name' => $product->name_product,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['img' => $product->avatar]
        ]);
        $cart = Cart::content();
        $result =[];
        foreach ($cart as $row)
        {
            array_push($result, $row->rowId);
        }
        return response()->json($result);
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
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return Cart::content();
    }
}
