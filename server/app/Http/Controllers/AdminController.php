<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
