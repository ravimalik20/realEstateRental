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
			["name" => "Doon (Kitchener) Campus"],
			["name" => "Cambridge Campus"],
			["name" => "Guelph Campus"],
			["name" => "Waterloo Campus"],
			["name" => "Brantford"],
			["name" => "Cambridge Downtown"],
			["name" => "Ingersoll Skills Training Centre"],
			["name" => "Stratford"]
		];

		\DB::table("campus")->insert($data);
    }
}
