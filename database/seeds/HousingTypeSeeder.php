<?php

use Illuminate\Database\Seeder;

class HousingTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			["name" => "Apartment"],
			["name" => "House"],
			["name" => "Sublet"],
			["name" => "Room"]
		];

		\DB::table("housing_type")->insert($data);
    }
}
