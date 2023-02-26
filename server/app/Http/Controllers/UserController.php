<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   
    public function show(string $id)
    {
        return User::findOrFail($id);
    }
    public function index()
    {
        $users = User::
        select('*')
        ->get();        
        return response()->json($users);
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
