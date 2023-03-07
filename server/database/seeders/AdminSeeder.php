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
             "email" => "adminphuc@gmail.com",
             "password" => Hash::make("12345"),
             "avatar"=>"admina1a.jpg",]
         ]
     );
    }
}
