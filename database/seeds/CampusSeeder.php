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
			["name" => "London"],
			["name" => "Woodstock"],
			["name" => "St. Thomas / Elgin"],
			["name" => "Clinton"]
		];

		\DB::table("campus")->insert($data);
    }
}
