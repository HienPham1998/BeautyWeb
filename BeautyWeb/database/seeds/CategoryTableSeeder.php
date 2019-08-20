<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            "name" => "make up"
        ]);
        DB::table('categories')->insert([
            "name" => "body care"
        ]);
        DB::table('categories')->insert([
            "name" => "hair care"
        ]);
        DB::table('categories')->insert([
            "name" => "skin care"
        ]);
        DB::table('categories')->insert([
            "name" => "perfum"
        ]);
    }
}
