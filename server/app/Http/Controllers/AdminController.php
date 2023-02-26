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
    public function destroy($id)
    {
        if(Admin::find($id)){
            Admin::destroy($id);
            session()->flash('mess', 'đã xóa');
        }
        // }else{
        //     session()->flash('mess', 'không thể xóa vì có  khách  hàng đã đặt');
        // }
        return redirect('');
    }

}
