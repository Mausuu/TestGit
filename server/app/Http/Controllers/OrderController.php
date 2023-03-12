<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function show($id)
    {
        //
        $order=Order::all();
        return response()->json($order); 
    }

    public function store(Request $request)
    {
        //
       
    }
       
    public function index()
    {
        //
        $order = Order::
            join('cart', 'order.cart_id', '=', 'cart.id')
            ->select(
                'order.*', 
                'cart.id_product as id_product',
                'cart.id_users as id_users',
                )
            ->get();        
            return response()->json($order);       
    }


}
