<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            ["name" => "admina",
             "email" => "admina@gmail.com",
             "password" =>"admina",
             "avatar"=>"admina.jpg",]
         ]  
     );
    }
}
