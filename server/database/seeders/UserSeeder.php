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
    public function run(): void
    {
        DB::table('users')->insert([
           ["name" => "demo",
            "email" => "demo@gmail.com",
            "password" =>"123456",
            "avatar"=>"demo.jpg",],
            [            
                    "name" => "demo2",
                    "email" => "demo2@gmail.com",
                    "password" =>"123456",
                    "avatar"=>"demo2.jpg",
            ]
        ]  
    );
    
        
    }
}
