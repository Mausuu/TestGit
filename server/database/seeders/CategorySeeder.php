<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert(
            [
                [
                    "cat_name" => "Bàn phím cơ",
                ], [
                    "cat_name" => "Bàn phím QWERTY",
                ], [
                    "cat_name" => "Bàn phím không dây",
                ], [
                    "cat_name" => "Bàn phím gaming",
                ]
            ]
        );
    }
}
