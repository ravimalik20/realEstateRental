<?php

use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
			["name" => "Business & Hospitality"],
			["name" => "Career & Academic Access"],
			["name" => "Engineering & IT"],
			["name" => "Health & Life Sciences and"],
			["name" => "Community Services"],
			["name" => "Language & Communications Studies"],
			["name" => "Liberal Studies"],
			["name" => "Media & Design"],
			["name" => "Trades & Apprenticeship"]
		];

		\DB::table("programs")->insert($data);
    }
}
