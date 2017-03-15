<?php

use Illuminate\Database\Seeder;

class PriceRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			["name" => "0"],
			["name" => "100"],
			["name" => "200"],
			["name" => "300"],
			["name" => "400"],
			["name" => "500"],
			["name" => "600"],
			["name" => "700"],
			["name" => "800"],
			["name" => "900"],
			["name" => "1000"],
			["name" => "1200"],
			["name" => "1400"],
			["name" => "1600"],
			["name" => "1800"],
			["name" => "2000"],
			["name" => "2500"],
			["name" => "3000"]
		];

		\DB::table("price_range")->insert($data);
    }
}
