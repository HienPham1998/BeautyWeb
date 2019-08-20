<?php

use Illuminate\Database\Seeder;

class ProviderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            "name" => "Bicicosmetics",
            "address" => "Lê Quang Định, Phường 14, Q.Bình Thạnh, TPHCM.",
            "phone" => "090.990.4560 ",
            "email" => "ceo.chinhnguyen@bicicosmetics.vn",
        ]);   
        DB::table('providers')->insert([
            "name" => "Boshop",
            "address" => "111B Nguyễn Lâm, Phường 3, Q. Bình Thạnh. TP. HCM",
            "phone" => "19007101 ",
            "email" => "boshop92@gmail.com",
        ]);   
        DB::table('providers')->insert([
            "name" => "Wholemartcosmetic",
            "address" => "335/1 Điện Biên Phủ, P. 4, Q.3,TP.HCM – 179 Cộng Hòa, P.13, Q.Tân Bình, TP.HCM.",
            "phone" => " 08 7109 9333 ",
            "email" => "wholemart.cosmetic111@gmail.com",
        ]);
        DB::table('providers')->insert([
            "name" => "Myphamhanquoc",
            "address" => " 385/68 Đường Quang Trung, Phường 10, Gò Vấp",
            "phone" => "0906 278 197 ",
            "email" => "myphamhanquoc@gmail.com",
        ]); 
        

    }
}
