<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Cart;

class OrderController extends Controller
{
    //
    public function show($id)
    {
        //
        $order = Order::all();
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->id_user = $request->id_user;
        $order->diachinguoinhan = $request->diachinguoinhan;
        $order->trangthai = 'dadat';
        $order->thanhtoan = 'COD';
        $order->sdt = $request->sdt;
        $order->ngaydat = $request->ngaydat;
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
    public function index()
    {
        //
        $order = Order::join('users', 'order.id_user', '=', 'users.id')
            ->join('cart', 'cart.id_users', '=', 'users.id')
            ->join('product', 'cart.id_product', '=', 'product.id')
            ->select(
                'order.*',
                'product.price',
                'product.name_product',
                'users.name',
                'cart.product_qty'
            )
            ->get();
        return response()->json($order);
    }
}
