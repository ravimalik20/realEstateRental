<?php

use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			["name" => "Doon (Kitchener) Campus", "lat" => 43.390718, "lng" => -80.405973],
			["name" => "Cambridge Campus", "lat" => 43.386413, "lng" => -80.395753],
			["name" => "Guelph Campus", "lat" => 43.538670, "lng" => -80.294535],
			["name" => "Waterloo Campus", "lat" => 43.479013, "lng" => -80.517921],
			["name" => "Brantford", "lat" => 43.140108, "lng" => -80.262798],
			["name" => "Cambridge Downtown", "lat" => 43.385246, "lng" => -80.397742],
			["name" => "Ingersoll Skills Training Centre", "lat" => 43.025370, "lng" => -80.897077],
			["name" => "Stratford", "lat" => 43.367543, "lng" => -80.994768]
		];

		\DB::table("campus")->insert($data);
    }
}
