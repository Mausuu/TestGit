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
            "avatar"  => "default.jpg",
            "url"   =>"http://127.0.0.1:8000/images/default.jpg",
            "cat_id"  =>"1",
            "detail"  => "aaaaaaa",
            "quantity"  =>"10",],
            [            
                "name_product" => "Cherry Mx Brown",
                "price" =>  "200000",
                "avatar"  => "default.jpg",
                "url"   =>"http://127.0.0.1:8000/images/default.jpg",
                "cat_id"  =>"1",
                "detail"  => "bbbbbb",
                "quantity"  =>"10",
            ],
            [            
                "name_product" => "Cherry Mx Pro",
                "price" =>  "200000",
                "avatar"  => "pr3.jpg",
                "url"   =>"http://localhost/images/",
                "cat_id"  =>"2",
                "detail"  => "cxcccccc",
                "quantity"  =>"10",
            ]
            //        
        ]);
    }
}
