<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 50; $i++) {
            DB::table("bills")->insert([
                "customer_id" => rand(3,20),
                "total" => rand(10, 100),
                "created_at" => $this->getRandomTimestamps()
            ]);
        }
    }

    function getRandomTimestamps($backwardDays = -50)
	{
		$backwardCreatedDays = rand($backwardDays, 0);

		return \Carbon\Carbon::now()->addDays($backwardCreatedDays)->addMinutes(rand(0, 60 * 23))->addSeconds(rand(0, 60));
	}
}

