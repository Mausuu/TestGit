<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user->name=$request->nameUser;
        $user->email=$request->emailUser;
        $user->password=Hash::make($request->passwordUser);
        $user->avatar=$request->avatarUser;
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
        $user->avatar=$data['avatarUser'];
        $user->save();
        return redirect()->route('user.index');
    }
    public function destroy($id)
    {
        $user =User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
    public function login(Request $request){
       if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = $request->user();
            $success['token'] = $user->createToken('MyApp')->planTextToken;
            $success['name'] = $user->name;

            $reponse =[
                'success' => true,
                'data' => $success,
                'message' => 'Dang nhap thanh cong'
            ];
       }
    }
}
