<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            ["name" => "NguyenPhuc",
             "email" => "admin@gmail.com",
             "password" => Hash::make("admin123"),
             "avatar"=>"default.jpg",
             "url"   =>"http://127.0.0.1:8000/images/default.jpg",]
             
         ]
     );
    }
}
