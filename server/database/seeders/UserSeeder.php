<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        DB::table('users')->insert([
           ["name" => "demo2",
            "email" => "user@gmail.com",
            "password" => Hash::make("user123456"),
            "avatar"=>"demo21.jpg",
            "url"   =>"http://127.0.0.1:8000/images/default.jpg"],
        ]  );   
    }
}
