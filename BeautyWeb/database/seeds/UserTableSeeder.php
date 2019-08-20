<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => "Pham Thi Hien",
            "email" => "hienp9237@gmail.com",
            "address" => "Nam Dinh",
            "phone" => "093284755",
            "password" =>  bcrypt('123456'),
            "role_id" => "2",
           
        ]);   
        DB::table('users')->insert([
            "name" => "Hien Pham",
            "email" => "hienktpm1@gmail.com",
            "address" => "Ha Noi",
            "phone" => "013345535",
            "password" =>  bcrypt('123456'),
            "role_id" => "1",
        ]);   

        $faker = Faker\Factory::create();
        for($i = 0; $i < 20; $i++) {
            DB::table("users")->insert([
                "name" => $faker->name,
                "email" => $faker->safeEmail,
                "address" => $faker->realtext(10),
                "phone" => $faker->phoneNumber,
                "password" =>  bcrypt('123456'),
                "role_id" => "2",
            ]);
        }
    }
}
