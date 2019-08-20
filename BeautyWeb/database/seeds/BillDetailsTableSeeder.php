<?php

use Illuminate\Database\Seeder;

class BillDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 50; $i++) {
            DB::table("billdetails")->insert([
                "bill_id" => rand(1,50),
                "product_id" => rand(1,100),
                "product_name"=> $faker->realtext(50),
                "quantity" => rand(1, 10),
                "price" => rand(10, 20)
            ]);
        }
    }
}
