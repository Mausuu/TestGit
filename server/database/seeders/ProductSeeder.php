<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        DB::table("product")->insert([
            ["name_product" => "Cherry MX Blue",
            "price" =>  "100000",
            "avatar"  => "pr1.jpg",
            "cat_id"  =>"1",],
            [            
                "name_product" => "Cherry Mx Brown",
                "price" =>  "200000",
                "avatar"  => "pr2.jpg",
                "cat_id"  =>"1",
            ],
            [            
                "name_product" => "Cherry Mx Pro",
                "price" =>  "200000",
                "avatar"  => "pr3.jpg",
                "cat_id"  =>"2",
            ]
            //
            
           
           
        ]);
    }
}
