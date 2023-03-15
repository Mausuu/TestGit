<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\DemoSendmail;
use Illuminate\Http\Request;


use App\Models\Cart;
use App\Models\CartOrder;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
  
    public function sendMail(Request $request,$id)
    {        
          $order = Order::find($id);  
          $order->trangthai = 'Đã xác nhận';
          $order->save();  
          Mail::to($request->email)->send(new DemoSendmail);
          return response()->json($order);
 
    }
    public function store(Request $request)
    {
        $order = new Order();
        $order->id_user = $request->id_user;
        $order->diachinguoinhan = $request->diachinguoinhan;
        $order->trangthai = 'Đã đặt';
        $order->thanhtoan = 'Thanh toán tiền mặt';
        $order->sdt = $request->sdt;
        $order->sum_cart = $request->sum_cart;
        $order->email=$request->email;
        $order->save();
        $this->delete($request->id_user);
        return response()->json(
            [
                'status' => 200,
                'message' => 'Thêm thành công'
            ]
        );
    }
    public function delete($id)
    {
       
        $cart = Cart::where('id_users', $id)->get();
        
        if ($cart) {
            foreach ($cart as $item) {
                $cartOrder = new CartOrder();
                $cartOrder->id_users = $item->id_users;
                $cartOrder->id_product = $item->id_product;
                $cartOrder->product_qty = $item->product_qty;
                $cartOrder->save();  
                $item->delete();  
            
                
            }
                     
            return response()->json(
                [
                    'status' => 201,
                    'message' => ' thành công'
                ]
            );
        }
        return response()->json(
            [
                'status' => 404,
                'message' => 'thất bại'
            ]
        );
    }
    public function index($id)
    {
         $order = Order::join('users', 'order.id_user', '=', 'users.id')
        ->where('users.id', '=', $id)
        ->select(
            'order.*',
            'users.name',
        )
        ->get();
    return response()->json($order);
    }
    // public function index($id)
    // {
    //      $order = Order::join('users', 'order.id_user', '=', 'users.id')
    //     ->join('cartorder', 'cartorder.id_users', '=', 'users.id')
    //     ->join('product', 'cartorder.id_product', '=', 'product.id')
    //     ->where('users.id', '=', $id)
    //     ->select(
    //         'order.*',
    //         'product.price',
    //         'users.name',
    //         'cartorder.product_qty'
    //     )
    //     ->get();
    // return response()->json($order);
    // }
}
