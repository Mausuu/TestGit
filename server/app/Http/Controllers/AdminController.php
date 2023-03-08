<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
>>>>>>> 7d158008bf3f6472abdf22c657b230d17711fb87

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
        $admin->name=$request->nameAdmin;
        $admin->email=$request->emailAdmin;
        $admin->password=Hash::make($request->passwordAdmin);
        if($request['avatarAdmin']){
            $img=$request['avatarAdmin'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($nameImg,File::get($img));
            $admin->avatar=$nameImg;
        }
       else{
            $admin->avatar='default.jpg';
       }
        $admin->save();
        return redirect()->route('admin.index');
    }
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $admin =Admin::find($id);
        $admin->name=$data['nameAdmin'];
        $admin->email=$data['emailAdmin'];
        $admin->password=Hash::make($data['passwordAdmin']);
        if($request['avatarAdmin']){
            Storage::disk('public')->delete($admin->avatar);//
            $img=$request['avatarAdmin'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($nameImg,File::get($img));
            $admin->avatar=$nameImg;
        }
       else{
            $admin->avatar='default.jpg';
       }
        $admin->save();
        return redirect()->route('admin.index');
    }
    public function destroy($id)
    {
      
        $admin =Admin::find($id);
        Storage::disk('public')->delete($admin->avatar);
        $admin->delete();
        return redirect()->route('admin.index');

        // $image=Image::find($id);
        // Storage::disk('public')->delete($image->name);
        // $image->delete();
        // return redirect()->route('image.index');
    }
<<<<<<< HEAD
   
    public function login(Request $request)
=======
    
    public function loginAdmin(Request $request)
>>>>>>> 7d158008bf3f6472abdf22c657b230d17711fb87
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
<<<<<<< HEAD
            $admin = Auth::admin();
            $token = $admin->createToken('API Token')->accessToken;
            $name = $admin->name;

            return response()->json([
                'token' => $token,
                'name' => $name
            ]);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
=======
            // Authentication passed...
            return response()->json(['message' => 'Login successful']);
        }

        return response()->json(['message' => 'Invalid email or password'], 401);
>>>>>>> 7d158008bf3f6472abdf22c657b230d17711fb87
    }
}
