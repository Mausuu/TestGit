<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
           ["name" => "demo1",
            "email" => "demo@gmail.com w2",
            "password" =>"1234567",
            "avatar"=>"demo1.jpg",]
        ]  
    );
    
        
    }
}
