<?php

use Illuminate\Database\Seeder;

class AmenitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			["name" => "Cable Included"],
			["name" => "Short Term"],
			["name" => "Dishwasher"],
			["name" => "Pool"],
			["name" => "Parking"],
			["name" => "Partially Furnished"],
			["name" => "Furnished"],
			["name" => "Air Conditioned"],
			["name" => "Microwave"],
			["name" => "Wheelchair Accessible"],
			["name" => "Internet Included"],
			["name" => "Board Included"],
			["name" => "Laundry"],
		];

		\DB::table("amenities")->insert($data);
    }
}
