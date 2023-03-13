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
   
        $order=new Order();
        $order->id_user=$request->id_user;
        $order->diachinguoinhan=$request->diachinguoinhan;
        $order->trangthai='dadat';
        $order->thanhtoan='COD';
        $order->sdt=$request->sdt;
        //$order->ngaydat=$request->ngaydat;
       
        $order->save();
        return response()->json(
            [
                'status' =>200,
                'message' => 'Thêm thành công'
            ]
            );
    }
       
    public function index()
    {
        //
        $order = Order::
            join('users', 'order.id_user', '=', 'users.id')
            ->join('cart','cart.id_users', '=', 'users.id')
            ->join('product','cart.id_product', '=', 'product.id')
            ->select(
                'order.*', 
                'product.price','product.name_product',
                 'users.name',
                 'cart.product_qty'
                )
            ->get();        
            return response()->json($order);       
    }


}
