<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

use Illuminate\Support\Facades\Hash;

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
        $admin->avatar=$request->avatarAdmin;
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
        $admin->avatar=$data['avatarAdmin'];
        $admin->save();
        return redirect()->route('admin.index');
    }
    public function destroy($id)
    {
        $admin =Admin::find($id);
        $admin->delete();
        return redirect()->route('admin.index');
    }
    
}
