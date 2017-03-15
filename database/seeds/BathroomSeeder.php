<?php

use Illuminate\Database\Seeder;

class BathroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
			["name" => "1"],
			["name" => "1+"],
			["name" => "2"],
			["name" => "2+"],
			["name" => "3"],
			["name" => "3+"],
			["name" => "4"],
			["name" => "4+"],
			["name" => "5"],
			["name" => "5+"]
		];

		\DB::table("bathroom")->insert($data);
    }
}
