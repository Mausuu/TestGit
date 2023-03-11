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
        $id_users = $request->id_users;
        $id_product = $request->id_product;
        
        $product_check = Product::where('id', $id_product)->first();
        if ($product_check) {
            if (Cart::where('id_product', $id_product)->where('id_users', $id_users)->exists()) {
                $cart = Cart::where('id_product', $id_product)->where('id_users', $id_users)->first();
                $cart->product_qty+=1;
                $cart->save();
                return response()->json(
                    [
                        'status' => 400,
                        'message' => 'Sản phẩm đã tồn tại trong giỏ hàng',
                        'cart'=> $cart->product_qty
                    ]
                );
            } else {
                $cart = new Cart();
                $cart->id_users = $request->id_users;
                $cart->id_product = $request->id_product;
                $cart->product_qty = $request->product_qty;
                $cart->save();
                return response()->json(
                    [
                        'status' => 201,
                        'message' => 'Thêm thành công',
                        'id user' => $cart->id_users,
                        'id_product' => $cart->id_product,
                        'product_qty' => $cart->product_qty
                    ]
                );
            }
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Sản phẩm không tồn tại'
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
        $cart = Cart::
        join('product', 'product.id', '=', 'cart.id_product')
        ->select('cart.*','product.url','product.price','product.name_product',)
        ->where('id_users', $id)     
        ->get();        
        return response()->json($cart);      

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
        $cart = Cart::find($id);
        $cart->product_qty = $request->product_qty;
        $cart->save();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Update xong !!!'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart =Cart::find($id);
        $cart->delete();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Delete xong !!!'
            ]
        );
    }
}
