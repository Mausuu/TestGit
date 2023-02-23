<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function show(string $id)
    {
        return User::findOrFail($id)
        ;
    }
    public function index()
    {
        $users = User::
        select(
            '*')
        ->get();        
        return response()->json($users);
    }
}
