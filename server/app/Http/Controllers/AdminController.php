<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;


class AdminController extends Controller
{
    public function show(string $id)
    {
        return Admin::findOrFail($id)
        ;
    }
    public function index()
    {
        $admins = Admin::
        select(
            '*')
        ->get();        
        return response()->json($admins);
    }
    public function store(Request $request)
    {
        //$table->string('name',32);
        //$table->string('email',32)->unique();
        //$table->string('password',255);

        //
        $admin =new Admin();
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=Hash::make($request->password);
        if($request['avatar']){
            $img=$request['avatar'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put('images/' . $nameImg, File::get($img));
            $admin->avatar=$nameImg;
        }
       else{
            $admin->avatar='default.jpg';
       }
       $admin->url='http://127.0.0.1:8000/images/'.$admin->avatar;
        $admin->save();
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
        $admin =Admin::find($id);
        $admin->name=$data['name'];
        $admin->email=$data['email'];
        $admin->password=Hash::make($data['password']);
        if($request['avatar']){
            Storage::disk('public')->delete($admin->avatar);//
            $img=$request['avatar'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($nameImg,File::get($img));
            $admin->avatar=$nameImg;
        }
       else{
            $admin->avatar='default.jpg';
       }
        $admin->save();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Sửa xong !!!'
            ]
        );
    }
    public function destroy($id)
    {
      
        $admin =Admin::find($id);
        Storage::disk('public')->delete($admin->avatar);
        $admin->delete();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Delete xong !!!'
            ]
        );

        // $image=Image::find($id);
        // Storage::disk('public')->delete($image->name);
        // $image->delete();
        // return redirect()->route('image.index');
    }
    
    public function loginAdmin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

            $admin = Auth::guard('admin')->user();
            $token = $admin->createToken('AdminToken')->accessToken;
            return response()->json([
                'status'=> 202,
                'message' => 'Đăng nhập thành công',
                'token' => $token,
                'admin'=>$admin
            ]);
        }
        else
        {
             return response()->json([
                'status'=> 401,
                'message' => 'Đăng nhập thất bại'
            ]);
        }
       
        
    }
}
