<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
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
        $users = Product::join('category', 'product.cat_id', '=', 'category.id')
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
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Kiểm tra xem trường ảnh đại diện đã được thêm chưa
        if (!$request->hasFile('avatar')) {
            return response()->json(['error' => 'Vui lòng chọn ảnh đại diện'], 400);
        }


        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }


        $image = $request->file('avatar');
        $name = time() . '_' . $image->getClientOriginalName();
        $path = $image->move(public_path('images'), $name);

        // Kiểm tra nếu ảnh đã tồn tại thì xóa ảnh cũ trước khi lưu ảnh mới
        if (Storage::exists('public/images/' . $name)) {
            Storage::delete('public/images/' . $name);
        }

        $product = new Product();
        
        $product->name_product = $request->name_product;
        if (Product::where('name_product', $request->name_product)->exists()) {
            return response()->json(['error' => 'Tên sản phẩm đã tồn tại'], 400);
        }
        else{
  
        $product->avatar = $name;
        $product->url = 'http://127.0.0.1:8000/images/' . $product->avatar;
        $product->price = $request->price;
        $product->cat_id = $request->cat_id;
        $product->detail = $request->detail;
        $product->quantity = $request->quantity;
        $product->save();
        }
    
        return response()->json(['success' => true, 'product' => $product], 201);
    }
    // public function update(Request $request, $id)
    // {


    //     $data = $request->all();
    //     $product = Product::find($id);
    //     $product->name_product = $data['name_product'];
    //     $product->price = $data['price'];
    //     if ($request['avatar']) {
    //         Storage::disk('public')->delete($product->avatar);
    //         $img = $request['avatar'];
    //         $nameImg = time() . '_' . $img->getClientOriginalName();
    //         Storage::disk('public')->put($nameImg, File::get($img));
    //         $product->avatar = $nameImg;
    //     } else {
    //         $product->avatar = 'default.jpg';
    //     }

    //     $product->cat_id = $data['cat_id'];
    //     $product->detail = $data['detail'];
    //     $product->quantity = $data['quantity'];

    //     $product->save();
    //     return response()->json(
    //         [
    //             'status' => 200,
    //             'message' => 'Sửa thành công'
    //         ]
    //     );
    // }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm'], 404);
        }
    
        // Kiểm tra xem trường ảnh đại diện đã được thêm chưa
        if ($request->hasFile('avatar')) {
            $validator = Validator::make($request->all(), [
                'avatar' => 'required|image|max:2048'
            ]);
    
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }
    
            $image = $request->file('avatar');
            $name = time() . '_' . $image->getClientOriginalName();
            $path = $image->move(public_path('images'), $name);
    
            // Xóa ảnh cũ trước khi lưu ảnh mới
            if (Storage::exists('public/images/' . $product->avatar)) {
                Storage::delete('public/images/' . $product->avatar);
            }
    
            $product->avatar = $name;
            $product->url = 'http://127.0.0.1:8000/images/' . $product->avatar;
        }
    
        $product->name_product = $request->input('name_product', $product->name_product);
        $product->price = $request->input('price', $product->price);
        $product->cat_id = $request->input('cat_id', $product->cat_id);
        $product->detail = $request->input('detail', $product->detail);
        $product->quantity = $request->input('quantity', $product->quantity);
    
        $product->save();
    
        return response()->json(['success' => true, 'product' => $product], 200);
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
        $product = Product::all();
        return response()->json($product);
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

        $product = Product::find($id);
        Storage::disk('public')->delete($product->avatar); //
        return $product->delete();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Delete xong !!!'
            ]
        );
    }
}
