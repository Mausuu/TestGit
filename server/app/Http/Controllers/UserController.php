<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
   
    public function show(string $id)
    {
        return User::findOrFail($id);
    }
    //
    public function index()
    {
        $users = User::
        select('*')
        ->get();        
        return response()->json($users);
    }
    public function store(Request $request)
    {
 
        $user =new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        if($request['avatar']){
            $img=$request['avatar'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($nameImg,File::get($img));
            $user->avatar=$nameImg;
        }
         else{
            $user->avatar='default.jpg';
         }
        $user->url='http://127.0.0.1:8000/images';
        $user->save();   
        return response()->json(
            [
                'status' => 200,
                'message' => 'Thêm xong !!!'
            ]
        );
    }
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $user =User::find($id);
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->save();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Sửa Thành Công !!!'
            ]
        );
    }
    public function destroy($id)
    {

        $user =User::find($id);
        Storage::disk('public')->delete($user->avatar);
        $user->delete();
        return response()->json(
            [
                'status' => 200,
                'message' => 'Delete xong !!!'
            ]
        );
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
           $token = $user->//createToken('API Token')->accessToken;
            $user = $user; 
            return response()->json([
                'status' => 202,
               'token' => $token,
                'user' => $user,       
            ]);
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Mật khâu hoặc email bị sai',
                ]
            );
        }
    }
}
