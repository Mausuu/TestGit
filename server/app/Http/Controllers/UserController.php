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
        //$table->string('name',32);
        // $table->string('email',32)->unique();
        // $table->string('password',50);
        // $table->string('avatar',255);
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
        $user->save();   
        return redirect()->route('user.index');
    }
    public function update(Request $request, $id)
    {
        $data=$request->all();
        $user =User::find($id);
        $user->name=$data['nameUser'];
        $user->email=$data['emailUser'];
        $user->password=Hash::make($data['passwordUser']);

        if($request['avatarUser']){
            Storage::disk('public')->delete($user->avatar);//
            $img=$request['avatarUser'];
            $nameImg=time().'_'.$img->getClientOriginalName();
            Storage::disk('public')->put($nameImg,File::get($img));
            $user->avatar=$nameImg;
        }
       else{
            $user->avatar='default.jpg';
       }
        $user->save();
        return redirect()->route('user.index');
    }
    public function destroy($id)
    {

        $user =User::find($id);
        Storage::disk('public')->delete($user->avatar);
        $user->delete();
        return redirect()->route('user.index');
    }
<<<<<<< HEAD
    public function login(Request $request)
    {
=======
    public function loginUser(Request $request){
>>>>>>> 7d158008bf3f6472abdf22c657b230d17711fb87
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->accessToken;
            $name = $user->name;

            return response()->json([
                'token' => $token,
<<<<<<< HEAD
                'name' => $name,
=======
                'name' => $name
>>>>>>> 7d158008bf3f6472abdf22c657b230d17711fb87
            ]);
        } else {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    }
}
